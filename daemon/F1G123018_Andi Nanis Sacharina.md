# Langkah-Langkah Membuat Proses Daemon

1. **Membangun Aplikasi Web**: Gunakan Flask untuk membuat aplikasi web sederhana.
2. **Instalasi Dependensi**: Pasang paket python-daemon dengan menjalankan perintah:
3. **Mengkonversi Aplikasi Menjadi Daemon**: 
   - Buat file daemon (`daemon_flask.py`) yang memungkinkan aplikasi Flask berjalan di latar belakang.
   - Manfaatkan `with daemon.DaemonContext()` untuk memastikan proses berjalan di background.
4. **Menjalankan Daemon**: 
   Eksekusi perintah berikut untuk memulai daemon:
   ```
   python daemon_flask.py
   ```
5. **Bukti Screenshot**: 
   Berikut adalah bukti visual yang menunjukkan bahwa aplikasi berhasil dijalankan:

   ![Screenshot Aplikasi Berjalan](https://drive.google.com/file/d/1cl5bE_3PUiwL67lshMeGjnKM0of6NIDO/view?usp=drive_link)
