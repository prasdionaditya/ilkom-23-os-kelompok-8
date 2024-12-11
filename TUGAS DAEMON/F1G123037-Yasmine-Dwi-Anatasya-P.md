# Menjalankan Proses Daemon di Laravel

## Definisi Daemon
Daemon adalah program komputer yang beroperasi di latar belakang sistem operasi (OS) dan mengelola permintaan layanan secara berkala. Daemon biasanya diaktifkan saat sistem di-boot dan akan terus berjalan hingga sistem dimatikan.

## Deskripsi
Dokumen ini berfungsi sebagai panduan untuk menjelaskan cara membuat dan menggunakan skrip yang memungkinkan Anda menjalankan dan menghentikan server Laravel sebagai daemon.

## Langkah-langkah

### 1. Bahan yang Diperlukan
- **Unduh [Laragon](https://laragon.org/download)** dari situs resmi Laragon.
- **Unduh [Git](https://git-scm.com/downloads)** dari situs resminya.

### 2. Buat Proyek Laravel atau Clone dari Repositori Lain

#### a. Clone Proyek Laravel
Clone proyek Laravel yang diinginkan dari repositori lain dengan perintah:
```bash
git clone <proyek_yang_akan_diclone>
```
#### b. Buka Folder Proyek
Buka folder proyek Laravel yang telah ada atau yang telah diclone sebelumnya menggunakan teks editor pilihan Anda.

### 3. Membuat Skrip Daemon

#### a. Buka Git Bash
Buka Git Bash terlebih dahulu.

#### b. Buat File Skrip
Buat file baru dengan nama `laravel-daemon.sh` menggunakan perintah:
```bash
touch laravel-daemon.sh
```

#### c. Edit File Skrip
Buka file `laravel-daemon.sh` menggunakan editor teks favorit Anda (seperti Visual Studio Code, Notepad++, atau editor lainnya).

#### d. Masukkan Skrip
Salin dan tempel skrip berikut ke dalam file:
```bash
#!/bin/bash

case "$1" in
    start)
        # Cek apakah server sudah berjalan
        if [ -f laravel.pid ]; then
            echo "Server Laravel sudah berjalan."
            exit 1
        fi

        # Jalankan server dan simpan PID ke file
        nohup php artisan serve > /dev/null 2>&1 &
        echo $! > laravel.pid
        echo "Server Laravel dimulai."
        ;;
    stop)
        # Cek apakah file PID ada
        if [ -f laravel.pid ]; then
            PID=$(cat laravel.pid)
            kill $PID
            rm laravel.pid
            echo "Server Laravel dihentikan."
        else
            echo "Tidak ada server Laravel yang berjalan."
        fi
        ;;
    *)
        echo "Penggunaan: $0 {start|stop}"
        exit 1
        ;;
esac
```

#### e. Berikan Izin Eksekusi
Jalankan perintah berikut untuk memberikan izin eksekusi pada skrip:
```bash
chmod +x laravel-daemon.sh
```

### 4. Menjalankan dan Menghentikan Server

#### a. Untuk Memulai Server
Jalankan server dengan perintah:
```bash
./laravel-daemon.sh start
```
**Pesan yang muncul:** 
```
Server Laravel dimulai.
```

#### b. Untuk Menghentikan Server
Hentikan server dengan perintah:
```bash
./laravel-daemon.sh stop
```
**Pesan yang muncul:**
```
Server Laravel dihentikan.
```

### 5. Mengakses Aplikasi Laravel
Setelah server berjalan, nyalakan Laragon untuk menghubungkan databasenya, lalu buka browser dan masukkan URL:
```
http://localhost:8000
```

### 6. Screenshot
Tampilan web yang dihasilkan dapat dilihat pada gambar berikut:
![Tampilan Localhost:8000](https://drive.google.com/file/d/1-nQlyY4nR6ZXsYmFxGRb18L9OeFaSp89/view?usp=drive_link)