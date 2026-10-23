# Build APK tanpa Google Play

## Melalui GitHub Actions

Workflow: `.github/workflows/build-android-apk.yml`.

- Trigger: push ke branch `feature/android-webview-kip-2026` dengan perubahan folder `android/` atau workflow.
- Hasil: artifact `PPID-KemenkoPM-Android-Uji`, berisi `app-debug.apk` dan `SHA256SUMS.txt`.
- GitHub > repo PPID > Actions > pilih run > download artifact ZIP > extract APK.
- Debug APK ditandatangani oleh debug keystore milik runner. Jangan gunakan untuk rilis publik/Play Store.
- Release APK yang diterbitkan ke publik harus menggunakan keystore rilis organisasi dan proses penyimpanan kunci yang aman.

## Alternatif Android Studio

Buka folder `android/` dan jalankan `./gradlew :app:assembleDebug` jika Gradle Wrapper sudah dipasang. Paket sumber ini tidak menyertakan wrapper JAR; Android Studio akan memakai Gradle dari sistem sesuai konfigurasi yang dimilikinya. Dengan Gradle 8.11.1 terpasang, jalankan:

```sh
gradle -p android :app:assembleDebug
```

## Distribusi terbatas

- Distribusikan APK hanya kepada penguji internal yang ditunjuk.
- Sebelum instalasi, cocokkan hash SHA256 dan nama berkas.
- Jangan memasukkan data pribadi nyata ke aplikasi prototipe tanpa persetujuan uji.
- APK debug bukan bukti publikasi pada Play Store.
