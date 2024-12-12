# Arsitektur Docker

Docker memiliki arsitektur yang terdiri dari beberapa komponen utama yang bekerja bersama untuk menyediakan platform containerization. Berikut adalah penjelasan detailnya:

## 1. **Docker Engine**
Docker Engine adalah inti dari Docker yang bertugas menjalankan dan mengelola container. Docker Engine terdiri dari tiga komponen utama:

### a. **Docker Daemon (dockerd)**
- Berfungsi sebagai service yang berjalan di background.
- Bertanggung jawab untuk membangun, menjalankan, dan mengelola container.
- Berinteraksi dengan Docker CLI dan REST API.

### b. **Docker CLI**
- Command Line Interface (CLI) untuk pengguna berinteraksi dengan Docker.
- Perintah seperti `docker run`, `docker build`, dan `docker ps` dikirimkan melalui CLI ke Docker Daemon.

