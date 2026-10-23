# Checklist uji internal dan bukti dukung PPID Android — KIP 2026

**Identitas**

- Nama: PPID Kemenko PM (Uji)
- URL layanan: https://ppid.pemberdayaan.go.id/
- Versi uji: 0.1.0-internal
- Tanggal APK dibangun: __________
- Nama penguji dan unit: __________
- Perangkat / Android versi: __________
- SHA256 APK: __________
- Nomor dokumen penugasan/persetujuan (jika ada): __________

## Bukti uji yang HARUS dilakukan di perangkat

- [ ] Aplikasi terpasang dan dapat dibuka.
- [ ] Koneksi HTTPS berfungsi; halaman beranda tampil utuh di layar Android.
- [ ] Navigasi Beranda, Informasi, Permohonan, Keberatan berfungsi.
- [ ] Halaman Informasi Publik Berkala, Setiap Saat, Serta Merta dapat dibuka.
- [ ] Minimal satu file PDF riil dapat ditampilkan melalui viewer native.
- [ ] Minimal satu file PDF riil dapat diunduh ke folder Downloads.
- [ ] Formulir permohonan dapat ditampilkan dan diisi (uji pengiriman hanya dengan otorisasi pada lingkungan uji).
- [ ] Formulir keberatan dapat ditampilkan dan diisi (uji pengiriman hanya dengan otorisasi pada lingkungan uji).
- [ ] Halaman gagal terhubung internet menghasilkan pesan yang jelas.
- [ ] Tautan eksternal tidak diam-diam dibuka di dalam WebView dan tetap aman.
- [ ] Tombol kembali dan refresh bekerja.
- [ ] Tidak ada crash pada sedikitnya dua perangkat / versi Android bila tersedia.
- [ ] Kebijakan privasi dan akses ke data pribadi diverifikasi.

## Lampiran untuk bukti dukung

1. Screenshot beranda Android beserta nama aplikasi di home screen.
2. Screenshot menu Informasi Publik dan salah satu dokumen PDF.
3. Screenshot menu Permohonan dan Keberatan (tanpa data pribadi pengguna sebenarnya).
4. Screenshot atau video uji membuka dan mengunduh dokumen.
5. Nama file APK, ukuran berkas, hash SHA256, dan hasil verifikasi instalasi.
6. Rekap bug dan hasil tindak lanjut.
7. Surat penugasan, berita acara uji, atau dokumen pendukung kewenangan bila diperlukan.

## Pernyataan status

Prototipe Android ini dibuat untuk pengujian internal aplikasi layanan PPID. Belum dipublikasikan di Google Play Store. Status capaian indikator SAQ KIP harus mengikuti instrumen resmi dan bukti yang telah diverifikasi.
