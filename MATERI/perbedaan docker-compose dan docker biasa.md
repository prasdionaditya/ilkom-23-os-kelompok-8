# Perbedaan Docker Biasa dan Docker Compose

Docker dan Docker Compose keduanya digunakan untuk bekerja dengan kontainer, namun keduanya memiliki tujuan dan cara penggunaan yang berbeda. Berikut adalah perbedaan mendasar antara **Docker biasa** dan **Docker Compose**.

## 1. **Penggunaan dan Tujuan**

### Docker Biasa:
- **Tujuan**: Docker digunakan untuk menjalankan aplikasi dalam kontainer tunggal. Setiap kontainer dikelola dan dijalankan secara individu.
- **Kegunaan**: Digunakan untuk membuat, menjalankan, dan mengelola kontainer satu per satu. Biasanya, Docker biasa digunakan untuk aplikasi atau layanan yang hanya membutuhkan satu kontainer.
- **Perintah Utama**:
  - `docker run` untuk menjalankan kontainer.
  - `docker ps` untuk melihat kontainer yang sedang berjalan.
  - `docker build` untuk membangun image dari Dockerfile.

### Docker Compose:
- **Tujuan**: Docker Compose digunakan untuk mendefinisikan dan menjalankan aplikasi yang terdiri dari beberapa kontainer (multi-kontainer). Dengan Docker Compose, kamu dapat mengelola beberapa kontainer yang saling terhubung secara lebih mudah dalam satu proyek.
- **Kegunaan**: Biasanya digunakan untuk aplikasi yang memerlukan lebih dari satu layanan atau komponen yang bekerja bersama-sama (misalnya, web server, database, dan cache).
- **Perintah Utama**:
  - `docker-compose up` untuk membangun dan menjalankan seluruh layanan yang didefinisikan dalam file `docker-compose.yml`.
  - `docker-compose down` untuk menghentikan dan menghapus kontainer serta jaringan yang dibuat oleh Compose.
  - `docker-compose logs` untuk melihat log dari semua layanan yang berjalan.

## 2. **Cara Konfigurasi dan Pengelolaan**

### Docker Biasa:
- **Konfigurasi Manual**: Setiap kontainer harus dijalankan secara manual dengan konfigurasi yang spesifik melalui perintah `docker run`. Misalnya, kamu perlu menentukan port, volume, dan variabel lingkungan untuk setiap kontainer secara terpisah.
- **Pengelolaan Satu Kontainer**: Docker hanya fokus pada pengelolaan satu kontainer, sehingga jika kamu ingin menjalankan beberapa kontainer yang saling berhubungan, kamu perlu mengelola masing-masing kontainer secara manual.

### Docker Compose:
- **Konfigurasi Terpusat**: Docker Compose menggunakan satu file konfigurasi, yaitu `docker-compose.yml`, untuk mendefinisikan dan mengonfigurasi semua layanan yang dibutuhkan oleh aplikasi. Di dalam file ini, kamu dapat menyebutkan berbagai layanan, jaringan, dan volume yang diperlukan.
- **Pengelolaan Multi-Kontainer**: Docker Compose memudahkan pengelolaan aplikasi yang terdiri dari beberapa kontainer. Dengan satu perintah, kamu dapat memulai seluruh aplikasi yang terdiri dari beberapa layanan dan kontainer yang saling terhubung.

## 3. **Kompleksitas Aplikasi yang Dikelola**

### Docker Biasa:
- **Kontainer Tunggal**: Ideal untuk aplikasi yang hanya membutuhkan satu kontainer. Misalnya, menjalankan sebuah server web atau database sederhana di dalam satu kontainer.
- **Pengaturan Manual untuk Multi-Kontainer**: Jika aplikasi membutuhkan lebih dari satu kontainer (misalnya, aplikasi web dan database), kamu harus mengelola masing-masing kontainer secara manual, menghubungkannya satu per satu, dan mengonfigurasi port serta jaringan secara eksplisit.

### Docker Compose:
- **Aplikasi Multi-Kontainer**: Ideal untuk aplikasi yang terdiri dari beberapa layanan yang harus berjalan bersama-sama. Misalnya, aplikasi web yang terhubung dengan database dan cache.
- **Sederhana untuk Multi-Kontainer**: Dengan Docker Compose, kamu dapat mendefinisikan banyak layanan di dalam satu file konfigurasi dan menjalankannya bersama-sama dengan satu perintah.

## 4. **Pengelolaan Jaringan**

### Docker Biasa:
- **Pengaturan Jaringan Manual**: Jika kamu menjalankan beberapa kontainer, kamu harus mengatur jaringan secara manual untuk memastikan kontainer dapat saling terhubung.
  
### Docker Compose:
- **Pengelolaan Jaringan Otomatis**: Docker Compose secara otomatis membuat jaringan yang memungkinkan kontainer yang didefinisikan dalam file `docker-compose.yml` untuk berkomunikasi satu sama lain tanpa perlu pengaturan manual.

## 5. **Proses Pembuatan dan Pengelolaan Layanan**

### Docker Biasa:
- **Setiap Kontainer Dikelola Secara Terpisah**: Kamu perlu menjalankan dan mengelola setiap kontainer secara terpisah dengan perintah `docker run` atau `docker build`.
  
### Docker Compose:
- **Mendefinisikan Layanan dalam Satu File**: Kamu mendefinisikan berbagai layanan yang diperlukan dalam aplikasi menggunakan file `docker-compose.yml`, yang kemudian bisa dijalankan, dihentikan, atau diatur secara bersamaan.

## 6. **Pengelolaan Volume dan Data Persisten**

### Docker Biasa:
- **Pengaturan Volume Manual**: Jika kontainer membutuhkan volume untuk menyimpan data persisten, kamu harus mengonfigurasi volume tersebut secara manual melalui perintah `docker run`.
  
### Docker Compose:
- **Pengelolaan Volume Otomatis**: Docker Compose memungkinkan kamu untuk mendefinisikan volume di dalam file `docker-compose.yml`, dan volume tersebut akan secara otomatis dikelola bersama dengan layanan yang membutuhkan volume tersebut.

## 7. **Sumber Daya dan Skalabilitas**

### Docker Biasa:
- **Skalabilitas Manual**: Jika kamu ingin menambah atau mengurangi jumlah kontainer dari suatu layanan, kamu harus melakukan pengaturan dan skalabilitas secara manual.
  
### Docker Compose:
- **Skalabilitas Otomatis**: Docker Compose memungkinkan kamu untuk mengonfigurasi jumlah replika dari setiap layanan, dan dengan perintah `docker-compose up --scale`, kamu bisa dengan mudah mengatur jumlah kontainer yang dibutuhkan.

## 8. **Contoh Kasus Penggunaan**

### Docker Biasa:
- **Penggunaan Tunggal**: Ideal untuk pengujian atau aplikasi kecil yang hanya membutuhkan satu kontainer, seperti server web statis, database kecil, atau aplikasi dengan satu kontainer saja.
  
### Docker Compose:
- **Aplikasi Kompleks**: Digunakan untuk aplikasi yang terdiri dari beberapa layanan, seperti aplikasi web yang membutuhkan database, cache, dan server aplikasi, di mana semua layanan perlu dijalankan dan terhubung bersama.

## 9. **Perintah Utama**

| **Perintah**              | **Docker Biasa**              | **Docker Compose**             |
|---------------------------|-------------------------------|--------------------------------|
| **Menjalankan Kontainer**  | `docker run`                  | `docker-compose up`            |
| **Membangun Gambar**       | `docker build`                | `docker-compose build`         |
| **Melihat Kontainer yang Berjalan** | `docker ps`          | `docker-compose ps`            |
| **Menghentikan Kontainer** | `docker stop`                 | `docker-compose down`          |
| **Melihat Log**            | `docker logs`                 | `docker-compose logs`          |

## Kesimpulan

- **Docker Biasa** sangat cocok untuk pengelolaan aplikasi dengan satu kontainer. Jika kamu hanya perlu menjalankan satu layanan, Docker biasa sudah cukup untuk digunakan.
- **Docker Compose** lebih cocok untuk aplikasi yang membutuhkan banyak kontainer dan layanan yang saling berhubungan, serta memudahkan pengelolaan dan orkestrasi berbagai layanan yang berjalan bersamaan.

Docker Compose menyederhanakan pengelolaan aplikasi multi-kontainer dan mempercepat pengembangan dan pengujian aplikasi yang lebih kompleks. Dengan Docker Compose, kamu dapat mendefinisikan, menjalankan, dan mengelola semua layanan aplikasi dalam satu file konfigurasi.
