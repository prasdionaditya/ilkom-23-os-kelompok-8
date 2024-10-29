# Menjalankan Proses Daemon di Laravel

## Definisi Daemon
Daemon adalah program yang berjalan di latar belakang sistem operasi, bertugas untuk menangani permintaan layanan secara otomatis tanpa interaksi pengguna langsung.

## Deskripsi
Dokumen ini berfungsi sebagai panduan untuk membuat skrip yang memungkinkan Anda menjalankan dan menghentikan server Laravel sebagai daemon.

## Langkah-langkah

### 1. Bahan yang Diperlukan
- **Unduh [Laragon](https://laragon.org/download)** dari situs resminya.
- **Unduh [Git](https://git-scm.com/downloads)** dari situs resminya.

### 2. Membuat Proyek Laravel

#### a. Membuat Proyek Baru
Buat proyek Laravel baru dengan perintah:
```bash
composer create-project --prefer-dist laravel/laravel nama_proyek
```

#### b. Masuk ke Folder Proyek
Masuk ke folder proyek yang baru dibuat dengan perintah:
```bash
cd nama_proyek
```

### 3. Membuat Skrip Daemon

#### a. Buka Terminal
Buka terminal untuk mulai membuat skrip.

#### b. Buat File Skrip
Buat file baru dengan nama `laravel-server.sh` menggunakan perintah:
```bash
touch laravel-server.sh
```

#### c. Edit File Skrip
Buka file `laravel-server.sh` menggunakan editor teks favorit Anda.

#### d. Masukkan Skrip
Salin dan tempel skrip berikut ke dalam file:
```bash
#!/bin/bash

case "$1" in
    start)
        if [ -f laravel.pid ]; then
            echo "Server Laravel sudah aktif."
            exit 1
        fi
        nohup php artisan serve --host=127.0.0.1 --port=8000 > /dev/null 2>&1 &
        echo $! > laravel.pid
        echo "Server Laravel berhasil dimulai."
        ;;
    stop)
        if [ -f laravel.pid ]; then
            PID=$(cat laravel.pid)
            kill $PID
            rm laravel.pid
            echo "Server Laravel berhasil dihentikan."
        else
            echo "Tidak ada server Laravel yang aktif."
        fi
        ;;
    *)
        echo "Gunakan: $0 {start|stop}"
        exit 1
        ;;
esac
```

#### e. Berikan Izin Eksekusi
Jalankan perintah berikut untuk memberikan izin eksekusi pada skrip:
```bash
chmod +x laravel-server.sh
```

### 4. Menjalankan dan Menghentikan Server

#### a. Untuk Memulai Server
Jalankan server dengan perintah:
```bash
./laravel-server.sh start
```
**Pesan yang muncul:** 
```
Server Laravel berhasil dimulai.
```

#### b. Untuk Menghentikan Server
Hentikan server dengan perintah:
```bash
./laravel-server.sh stop
```
**Pesan yang muncul:**
```
Server Laravel berhasil dihentikan.
```

### 5. Mengakses Aplikasi Laravel
Setelah server aktif, buka browser dan masukkan URL:
```
http://127.0.0.1:8000
```

### 6. Screenshot
Tampilan web yang dihasilkan dapat dilihat pada gambar berikut:
![Tampilan Localhost:8000](https://drive.google.com/file/d/1-nQlyY4nR6ZXsYmFxGRb18L9OeFaSp89/view?usp=drive_link)