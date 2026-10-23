package id.go.pemberdayaan.ppid;

import android.app.Activity;
import android.app.DownloadManager;
import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.graphics.pdf.PdfRenderer;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.os.ParcelFileDescriptor;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.CookieManager;
import android.webkit.URLUtil;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.List;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

/** Native PDF reader: WebView on Android cannot reliably render PDF iframe content. */
public final class PdfActivity extends Activity {
    public static final String EXTRA_PREVIEW_URL = "preview_url";
    private static final String HOST = "ppid.pemberdayaan.go.id";
    private static final long MAX_BYTES = 60L * 1024 * 1024;

    private final ExecutorService worker = Executors.newSingleThreadExecutor();
    private File cachedPdf;
    private PdfRenderer pdfRenderer;
    private ParcelFileDescriptor descriptor;
    private ImageView imageView;
    private TextView status;
    private ProgressBar progress;
    private Button previous;
    private Button next;
    private int pageIndex;
    private String fileUrl;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Uri previewUri = Uri.parse(getIntent().getStringExtra(EXTRA_PREVIEW_URL) == null
                ? "" : getIntent().getStringExtra(EXTRA_PREVIEW_URL));
        List<String> parts = previewUri.getPathSegments();
        if (!"https".equalsIgnoreCase(previewUri.getScheme()) ||
                !HOST.equalsIgnoreCase(previewUri.getHost()) || parts.size() != 4 ||
                !"informasi".equals(parts.get(0)) || !"preview".equals(parts.get(1)) ||
                !parts.get(3).toLowerCase(java.util.Locale.ROOT).endsWith(".pdf")) {
            Toast.makeText(this, "Alamat dokumen tidak valid.", Toast.LENGTH_LONG).show();
            finish();
            return;
        }
        fileUrl = new Uri.Builder().scheme("https").authority(HOST)
                .appendPath("informasi").appendPath("file").appendPath(parts.get(2))
                .appendPath(parts.get(3)).build().toString();
        buildLayout(parts.get(3));
        worker.execute(this::downloadAndOpen);
    }

    private void buildLayout(String filename) {
        LinearLayout root = new LinearLayout(this);
        root.setOrientation(LinearLayout.VERTICAL);
        root.setBackgroundColor(Color.WHITE);
        root.setFitsSystemWindows(true);
        LinearLayout bar = new LinearLayout(this);
        bar.setGravity(Gravity.CENTER_VERTICAL);
        bar.setPadding(dp(8), dp(5), dp(8), dp(5));
        bar.setBackgroundColor(Color.rgb(119, 33, 47));
        Button back = new Button(this);
        back.setText("←");
        back.setContentDescription("Kembali");
        back.setOnClickListener(v -> finish());
        bar.addView(back, new LinearLayout.LayoutParams(dp(55), dp(48)));
        TextView title = new TextView(this);
        title.setText(filename);
        title.setSingleLine(true);
        title.setEllipsize(android.text.TextUtils.TruncateAt.END);
        title.setTextColor(Color.WHITE);
        bar.addView(title, new LinearLayout.LayoutParams(0, dp(48), 1));
        Button save = new Button(this);
        save.setText("Unduh");
        save.setOnClickListener(v -> enqueueDownload());
        bar.addView(save);
        root.addView(bar);

        progress = new ProgressBar(this);
        root.addView(progress, new LinearLayout.LayoutParams(dp(44), dp(44)));
        status = new TextView(this);
        status.setText("Memuat dokumen PDF...");
        status.setTextSize(14);
        status.setGravity(Gravity.CENTER);
        status.setPadding(dp(10), dp(10), dp(10), dp(10));
        root.addView(status);
        ScrollView scroll = new ScrollView(this);
        scroll.setFillViewport(true);
        imageView = new ImageView(this);
        imageView.setAdjustViewBounds(true);
        imageView.setScaleType(ImageView.ScaleType.FIT_CENTER);
        scroll.addView(imageView, new ScrollView.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT,
                ViewGroup.LayoutParams.WRAP_CONTENT));
        root.addView(scroll, new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, 0, 1));

        LinearLayout pager = new LinearLayout(this);
        pager.setGravity(Gravity.CENTER);
        previous = new Button(this);
        previous.setText("‹ Sebelumnya");
        previous.setEnabled(false);
        previous.setOnClickListener(v -> renderPage(pageIndex - 1));
        next = new Button(this);
        next.setText("Berikutnya ›");
        next.setEnabled(false);
        next.setOnClickListener(v -> renderPage(pageIndex + 1));
        pager.addView(previous, new LinearLayout.LayoutParams(0, dp(56), 1));
        pager.addView(next, new LinearLayout.LayoutParams(0, dp(56), 1));
        root.addView(pager);
        setContentView(root);
    }

    private void downloadAndOpen() {
        try {
            URL url = new URL(fileUrl);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setConnectTimeout(15000);
            connection.setReadTimeout(30000);
            connection.setInstanceFollowRedirects(false);
            String cookie = CookieManager.getInstance().getCookie(fileUrl);
            if (cookie != null) connection.setRequestProperty("Cookie", cookie);
            try {
                if (connection.getResponseCode() != 200) throw new Exception("Server: " + connection.getResponseCode());
                if (connection.getContentLengthLong() > MAX_BYTES) throw new Exception("Dokumen terlalu besar");
                cachedPdf = File.createTempFile("ppid-preview-", ".pdf", getCacheDir());
                try (InputStream in = connection.getInputStream(); FileOutputStream out = new FileOutputStream(cachedPdf)) {
                    byte[] buffer = new byte[32768];
                    int read;
                    long bytes = 0;
                    while ((read = in.read(buffer)) != -1) {
                        bytes += read;
                        if (bytes > MAX_BYTES) throw new Exception("Dokumen terlalu besar");
                        out.write(buffer, 0, read);
                    }
                }
            } finally {
                connection.disconnect();
            }
            try (FileInputStream input = new FileInputStream(cachedPdf)) {
                byte[] magic = new byte[4];
                if (input.read(magic) != 4 || magic[0] != '%' || magic[1] != 'P' ||
                        magic[2] != 'D' || magic[3] != 'F') throw new Exception("Respons bukan PDF");
            }
            descriptor = ParcelFileDescriptor.open(cachedPdf, ParcelFileDescriptor.MODE_READ_ONLY);
            pdfRenderer = new PdfRenderer(descriptor);
            runOnUiThread(() -> {
                progress.setVisibility(View.GONE);
                renderPage(0);
            });
        } catch (Exception e) {
            runOnUiThread(() -> {
                progress.setVisibility(View.GONE);
                status.setText("Gagal membuka PDF: " + e.getMessage() + ". Anda dapat mencoba tombol Unduh.");
            });
        }
    }

    private void renderPage(int index) {
        if (pdfRenderer == null || index < 0 || index >= pdfRenderer.getPageCount()) return;
        progress.setVisibility(View.VISIBLE);
        status.setText("Menampilkan halaman " + (index + 1) + "...");
        previous.setEnabled(false);
        next.setEnabled(false);
        worker.execute(() -> {
            try (PdfRenderer.Page page = pdfRenderer.openPage(index)) {
                int targetWidth = Math.min(1600, Math.max(700,
                        getResources().getDisplayMetrics().widthPixels));
                int height = Math.max(1, Math.min(3000,
                        Math.round((float) page.getHeight() / page.getWidth() * targetWidth)));
                Bitmap bitmap = Bitmap.createBitmap(targetWidth, height, Bitmap.Config.ARGB_8888);
                bitmap.eraseColor(Color.WHITE);
                page.render(bitmap, null, null, PdfRenderer.Page.RENDER_MODE_FOR_DISPLAY);
                runOnUiThread(() -> {
                    Bitmap old = imageView.getDrawable() instanceof android.graphics.drawable.BitmapDrawable
                            ? ((android.graphics.drawable.BitmapDrawable) imageView.getDrawable()).getBitmap() : null;
                    imageView.setImageBitmap(bitmap);
                    if (old != null && old != bitmap && !old.isRecycled()) old.recycle();
                    pageIndex = index;
                    status.setText("Halaman " + (index + 1) + " dari " + pdfRenderer.getPageCount());
                    previous.setEnabled(index > 0);
                    next.setEnabled(index + 1 < pdfRenderer.getPageCount());
                    progress.setVisibility(View.GONE);
                });
            } catch (Exception e) {
                runOnUiThread(() -> {
                    progress.setVisibility(View.GONE);
                    status.setText("Gagal merender halaman: " + e.getMessage());
                    previous.setEnabled(index > 0);
                    next.setEnabled(index + 1 < pdfRenderer.getPageCount());
                });
            }
        });
    }

    private void enqueueDownload() {
        if (fileUrl == null) return;
        try {
            Uri uri = Uri.parse(fileUrl);
            String filename = URLUtil.guessFileName(fileUrl, null, "application/pdf");
            DownloadManager.Request request = new DownloadManager.Request(uri);
            request.setTitle(filename);
            request.setMimeType("application/pdf");
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
            request.setDestinationInExternalPublicDir(Environment.DIRECTORY_DOWNLOADS, filename);
            String cookie = CookieManager.getInstance().getCookie(fileUrl);
            if (cookie != null) request.addRequestHeader("Cookie", cookie);
            DownloadManager manager = (DownloadManager) getSystemService(Context.DOWNLOAD_SERVICE);
            if (manager == null) throw new Exception("Layanan unduhan tidak tersedia");
            manager.enqueue(request);
            Toast.makeText(this, "PDF disimpan ke folder Downloads.", Toast.LENGTH_LONG).show();
        } catch (Exception e) {
            Toast.makeText(this, "Unduhan gagal: " + e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    @Override
    protected void onDestroy() {
        worker.shutdownNow();
        if (imageView != null && imageView.getDrawable() instanceof android.graphics.drawable.BitmapDrawable) {
            Bitmap current = ((android.graphics.drawable.BitmapDrawable) imageView.getDrawable()).getBitmap();
            imageView.setImageDrawable(null);
            if (current != null && !current.isRecycled()) current.recycle();
        }
        try { if (pdfRenderer != null) pdfRenderer.close(); } catch (Exception ignored) { }
        try { if (descriptor != null) descriptor.close(); } catch (Exception ignored) { }
        if (cachedPdf != null) cachedPdf.delete();
        super.onDestroy();
    }

    private int dp(int n) {
        return Math.round(getResources().getDisplayMetrics().density * n);
    }
}
