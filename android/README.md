# PPID Kemenko PM — Android WebView (Uji Internal KIP 2026)

**Status**: Prototipe aplikasi Android untuk pengujian internal/bukti dukung KIP. **Bukan** aplikasi produksi, **belum** diterbitkan di Google Play Store, dan **bukan** pengganti portal PPID.

**Website sumber**: `https://ppid.pemberdayaan.go.id/`.

## Komponen

- Native Android shell, Java 17, Android SDK 35, min Android 10 (API 29).
- WebView yang memuat website resmi PPID dengan dukungan JavaScript, DOM storage, cookie sesi/CSRF.
- Navigasi Android: Beranda, Informasi Publik, Permohonan, Keberatan, refresh, tombol kembali.
- Domain navigasi internal dibatasi `ppid.pemberdayaan.go.id`; tautan eksternal dibuka di aplikasi eksternal.
- HTTP tidak diterima, kesalahan sertifikat HTTPS dihentikan, mixed content diblokir.
- File informasi publik diunduh melalui Android DownloadManager.
- Pratinjau PDF informasi publik dibuka menggunakan Android `PdfRenderer` (tanpa server/API baru).
- Pemilih file Android untuk kebutuhan formulir pada pengembangan mendatang.
- Tampilan memakai warna identitas #77212F (marun) dan #243669 (biru tua); ikon saat ini **sementara** dan harus diganti logo resmi berizin sebelum publikasi.

## Keterbatasan versi ini

1. Aplikasi memerlukan koneksi internet untuk konten website. Perubahan backend Laravel tidak diperlukan untuk versi WebView ini.
2. Akses publik `https://ppid.pemberdayaan.go.id` belum dapat diverifikasi dari lingkungan pembuatan. Uji langsung dari perangkat Android wajib dilakukan.
3. Penggunaan formulir permohonan/keberatan harus diuji end-to-end di lingkungan yang aman, tanpa membuat permohonan nyata palsu di produksi.
4. PDF tidak termasuk semua sumber tautan. Pembaca PDF native menangani URL pola `/informasi/preview/{kategori}/{file.pdf}`; dokumen lainnya dapat diunduh atau dibuka oleh aplikasi eksternal.
5. APK debug hanya untuk uji internal. APK tersebut ditandatangani dengan kunci debug otomatis; bukan rilis Play Store.
6. Ikon dan label menampilkan kata **(Uji)** agar prototipe tidak disalahartikan sebagai aplikasi produksi yang telah disahkan.

## Cara build lokal (Android Studio)

1. Buka Android Studio -> Open, pilih folder `android`.
2. Gunakan JDK 17 dan instal Android SDK Platform 35.
3. Tunggu Gradle Sync; kemudian Build -> Build APK(s).
4. Ambil `android/app/build/outputs/apk/debug/app-debug.apk`.
5. Salin APK ke perangkat Android 10+ (API 29) untuk pengujian.

Alternatif pada repo: GitHub Actions `.github/workflows/build-android-apk.yml` membangun APK debug pada branch pengembangan yang ditentukan. File APK berada di **Actions → workflow run → Artifacts**.

### Catatan penamaan paket

ID aplikasi prototipe adalah `id.go.pemberdayaan.ppid`. Sebelum publikasi final, mintakan persetujuan nama paket, penerbit, logo, dan penetapan pengelola aplikasi kepada instansi.

## Persiapan bukti dukung KIP

Ikuti checklist [`bukti-kip/CHECKLIST-PENGUJIAN.md`](../bukti-kip/CHECKLIST-PENGUJIAN.md). Bukti minimal mencakup APK beserta hash SHA256, tanggal build, perangkat/versi Android, screenshot layanan yang benar-benar berjalan, dokumentasi uji formulir dan PDF, serta berita acara pengujian yang ditandatangani bila diperlukan.

**Penting:** Apk yang dapat diinstal saja belum otomatis memenuhi indikator KIP; rujuk instrumen SAQ 2026 untuk indikator yang diklaim. Jangan mengklaim aplikasi telah tersedia untuk publik sebelum benar-benar dipublikasikan/distribusikan sesuai keputusan instansi.
