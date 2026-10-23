package id.go.pemberdayaan.ppid;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.DownloadManager;
import android.content.ActivityNotFoundException;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.net.ConnectivityManager;
import android.net.Network;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.CookieManager;
import android.webkit.DownloadListener;
import android.webkit.SslErrorHandler;
import android.net.http.SslError;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebResourceError;
import android.webkit.WebResourceRequest;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.webkit.URLUtil;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Locale;

import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

public final class MainActivity extends Activity {
    private static final String BASE = "https://ppid.pemberdayaan.go.id";
    private static final String HOST = "ppid.pemberdayaan.go.id";
    private static final int FILE_PICKER_REQUEST = 2101;

    private WebView webView;
    private SwipeRefreshLayout swipeRefreshLayout;
    private ProgressBar progressBar;
    private TextView errorBanner;
    private ValueCallback<Uri[]> uploadCallback;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setStatusBarColor(Color.rgb(36, 54, 105));
        getWindow().setNavigationBarColor(Color.rgb(36, 54, 105));
        buildLayout();
        configureWebView();
        if (savedInstanceState != null) {
            webView.restoreState(savedInstanceState);
        } else {
            webView.loadUrl(BASE);
        }
    }

    private void buildLayout() {
        LinearLayout root = new LinearLayout(this);
        root.setOrientation(LinearLayout.VERTICAL);
        root.setBackgroundColor(Color.WHITE);
        root.setFitsSystemWindows(true);


        progressBar = new ProgressBar(this, null, android.R.attr.progressBarStyleHorizontal);
        progressBar.setMax(100);
        progressBar.setVisibility(View.GONE);
        root.addView(progressBar, new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, dp(3)));

        errorBanner = new TextView(this);
        errorBanner.setText("Tidak dapat membuka PPID. Periksa internet, lalu ketuk untuk mencoba lagi.");
        errorBanner.setTextSize(13);
        errorBanner.setPadding(dp(12), dp(12), dp(12), dp(12));
        errorBanner.setTextColor(Color.rgb(95, 38, 18));
        errorBanner.setBackgroundColor(Color.rgb(255, 239, 213));
        errorBanner.setOnClickListener(v -> webView.reload());
        errorBanner.setVisibility(View.GONE);
        root.addView(errorBanner);

        webView = new WebView(this);
        webView.setBackgroundColor(Color.WHITE);

        // The website already renders the official PPID header.
        // Keep only native bottom navigation and enable pull-to-refresh.
        swipeRefreshLayout = new SwipeRefreshLayout(this);
        swipeRefreshLayout.setColorSchemeColors(Color.rgb(119, 33, 47), Color.rgb(36, 54, 105));
        swipeRefreshLayout.setOnChildScrollUpCallback((parent, child) -> webView.canScrollVertically(-1));
        swipeRefreshLayout.setOnRefreshListener(() -> webView.reload());
        swipeRefreshLayout.addView(webView,
                new ViewGroup.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT,
                        ViewGroup.LayoutParams.MATCH_PARENT));
        root.addView(swipeRefreshLayout,
                new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, 0, 1));

        LinearLayout nav = new LinearLayout(this);
        nav.setBackgroundColor(Color.rgb(36, 54, 105));
        addTab(nav, "Beranda", "/");
        addTab(nav, "Informasi", "/informasi-publik/berkala");
        addTab(nav, "Permohonan", "/layanan-informasi/permohonan-informasi");
        addTab(nav, "Keberatan", "/layanan-informasi/pengajuan-keberatan");
        root.addView(nav, new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, dp(62)));
        setContentView(root);
    }

    private void addTab(LinearLayout nav, String label, String path) {
        TextView tab = new TextView(this);
        tab.setText(label);
        tab.setGravity(Gravity.CENTER);
        tab.setTextColor(Color.WHITE);
        tab.setTextSize(12);
        tab.setContentDescription("Buka " + label);
        tab.setOnClickListener(v -> webView.loadUrl(BASE + path));
        nav.addView(tab, new LinearLayout.LayoutParams(0, ViewGroup.LayoutParams.MATCH_PARENT, 1));
    }

    private void configureWebView() {
        WebView.setWebContentsDebuggingEnabled(false);
        WebSettings settings = webView.getSettings();
        settings.setJavaScriptEnabled(true); // Website PPID uses AJAX/Alpine.js forms.
        settings.setDomStorageEnabled(true);
        settings.setAllowFileAccess(false);
        settings.setAllowContentAccess(true); // Android document picker integration.
        settings.setJavaScriptCanOpenWindowsAutomatically(false);
        settings.setSupportMultipleWindows(false);
        settings.setMixedContentMode(WebSettings.MIXED_CONTENT_NEVER_ALLOW);
        settings.setBuiltInZoomControls(true);
        settings.setDisplayZoomControls(false);
        settings.setLoadWithOverviewMode(true);
        settings.setUseWideViewPort(true);
        settings.setSafeBrowsingEnabled(true);
        CookieManager.getInstance().setAcceptCookie(true); // Needed for CSRF/session forms.
        CookieManager.getInstance().setAcceptThirdPartyCookies(webView, false);

        webView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                if (!request.isForMainFrame()) return false;
                return routeUri(request.getUrl());
            }

            @Override
            @SuppressWarnings("deprecation")
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                return routeUri(Uri.parse(url));
            }

            @Override
            public void onReceivedError(WebView view, WebResourceRequest request, WebResourceError error) {
                if (request.isForMainFrame()) {
                    errorBanner.setVisibility(View.VISIBLE);
                    swipeRefreshLayout.setRefreshing(false);
                }
            }

            @Override
            public void onPageStarted(WebView view, String url, android.graphics.Bitmap favicon) {
                errorBanner.setVisibility(View.GONE);
            }

            @Override
            public void onPageFinished(WebView view, String url) {
                swipeRefreshLayout.setRefreshing(false);
            }

            @Override
            public void onReceivedSslError(WebView view, SslErrorHandler handler, SslError error) {
                handler.cancel(); // Never bypass invalid certificates.
                swipeRefreshLayout.setRefreshing(false);
                errorBanner.setVisibility(View.VISIBLE);
                Toast.makeText(MainActivity.this, "Koneksi HTTPS tidak aman.", Toast.LENGTH_LONG).show();
            }
        });

        webView.setWebChromeClient(new WebChromeClient() {
            @Override
            public void onProgressChanged(WebView view, int newProgress) {
                progressBar.setProgress(newProgress);
                progressBar.setVisibility(newProgress >= 100 ? View.GONE : View.VISIBLE);
            }

            @Override
            public boolean onShowFileChooser(WebView webView, ValueCallback<Uri[]> callback, FileChooserParams params) {
                if (uploadCallback != null) uploadCallback.onReceiveValue(null);
                uploadCallback = callback;
                Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                intent.addCategory(Intent.CATEGORY_OPENABLE);
                intent.setType("*/*");
                try {
                    startActivityForResult(Intent.createChooser(intent, "Pilih berkas"), FILE_PICKER_REQUEST);
                    return true;
                } catch (ActivityNotFoundException e) {
                    uploadCallback = null;
                    return false;
                }
            }
        });

        webView.setDownloadListener((url, userAgent, contentDisposition, mimeType, contentLength) ->
                enqueueDownload(url, userAgent, contentDisposition, mimeType));
    }

    private boolean routeUri(Uri uri) {
        String scheme = uri.getScheme();
        if (scheme == null) return true;
        if (scheme.equalsIgnoreCase("tel") || scheme.equalsIgnoreCase("mailto")) {
            openExternal(uri);
            return true;
        }
        if (!scheme.equalsIgnoreCase("https")) return true;
        if (!HOST.equalsIgnoreCase(uri.getHost())) {
            openExternal(uri);
            return true;
        }
        String path = uri.getPath() == null ? "" : uri.getPath();
        if (path.startsWith("/informasi/preview/") && path.toLowerCase(Locale.ROOT).endsWith(".pdf")) {
            Intent intent = new Intent(this, PdfActivity.class);
            intent.putExtra(PdfActivity.EXTRA_PREVIEW_URL, uri.toString());
            startActivity(intent);
            return true;
        }
        if (path.startsWith("/informasi/download/") || path.startsWith("/informasi/file/") ||
                path.startsWith("/regulasi/download/") || path.startsWith("/lhkpn/download/")) {
            enqueueDownload(uri.toString(), webView.getSettings().getUserAgentString(), null, "application/pdf");
            return true;
        }
        return false;
    }

    private void openExternal(Uri uri) {
        try {
            Intent intent = new Intent(Intent.ACTION_VIEW, uri);
            startActivity(intent);
        } catch (ActivityNotFoundException e) {
            Toast.makeText(this, "Tidak ada aplikasi yang dapat membuka tautan.", Toast.LENGTH_LONG).show();
        }
    }

    private void enqueueDownload(String url, String userAgent, String contentDisposition, String mimeType) {
        Uri uri = Uri.parse(url);
        if (!"https".equalsIgnoreCase(uri.getScheme()) || !HOST.equalsIgnoreCase(uri.getHost())) {
            Toast.makeText(this, "Unduhan dari domain lain dibuka di browser.", Toast.LENGTH_LONG).show();
            if ("https".equalsIgnoreCase(uri.getScheme())) openExternal(uri);
            return;
        }
        try {
            String filename = URLUtil.guessFileName(url, contentDisposition, mimeType);
            DownloadManager.Request request = new DownloadManager.Request(uri);
            request.setTitle(filename);
            request.setDescription("Dokumen informasi publik PPID Kemenko PM");
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
            request.setMimeType(mimeType != null ? mimeType : "application/octet-stream");
            request.setDestinationInExternalPublicDir(Environment.DIRECTORY_DOWNLOADS, filename);
            request.addRequestHeader("User-Agent", userAgent != null ? userAgent : "Android");
            String cookie = CookieManager.getInstance().getCookie(url);
            if (cookie != null && !cookie.isEmpty()) request.addRequestHeader("Cookie", cookie);
            DownloadManager dm = (DownloadManager) getSystemService(Context.DOWNLOAD_SERVICE);
            if (dm == null) throw new IllegalStateException("DownloadManager tidak tersedia");
            dm.enqueue(request);
            Toast.makeText(this, "Pengunduhan dimulai. Periksa folder Downloads.", Toast.LENGTH_LONG).show();
        } catch (Exception e) {
            Toast.makeText(this, "Tidak dapat memulai unduhan: " + e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == FILE_PICKER_REQUEST && uploadCallback != null) {
            Uri[] uris = resultCode == RESULT_OK && data != null && data.getData() != null
                    ? new Uri[] { data.getData() } : null;
            uploadCallback.onReceiveValue(uris);
            uploadCallback = null;
        }
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        webView.saveState(outState);
        super.onSaveInstanceState(outState);
    }

    @Override
    @SuppressWarnings("deprecation")
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            new AlertDialog.Builder(this)
                    .setTitle("Tutup PPID?")
                    .setMessage("Keluar dari aplikasi uji PPID Kemenko PM?")
                    .setNegativeButton("Batal", null)
                    .setPositiveButton("Keluar", (d, which) -> finish())
                    .show();
        }
    }

    @Override
    protected void onPause() {
        CookieManager.getInstance().flush();
        super.onPause();
    }

    @Override
    protected void onDestroy() {
        if (uploadCallback != null) uploadCallback.onReceiveValue(null);
        if (webView != null) {
            webView.stopLoading();
            webView.destroy();
        }
        super.onDestroy();
    }

    private int dp(int n) {
        return Math.round(getResources().getDisplayMetrics().density * n);
    }
}
