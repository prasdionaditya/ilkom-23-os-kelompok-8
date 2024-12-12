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

### c. **Docker REST API**
- API yang memungkinkan aplikasi untuk berkomunikasi dengan Docker Daemon.
- Digunakan oleh Docker CLI dan alat lain untuk mengirim perintah ke Docker.

## 2. **Docker Objects**
Docker menggunakan beberapa objek untuk menyusun aplikasinya:

### a. **Images**
- Template read-only untuk membuat container.
- Dibangun menggunakan Dockerfile.

### b. **Containers**
- Instance yang berjalan dari image.
- Container adalah tempat aplikasi Anda berjalan.

### c. **Volumes**
- Penyimpanan data persisten untuk container.
- Digunakan untuk menjaga data tetap ada meskipun container dihapus.

### d. **Networks**
- Digunakan untuk menghubungkan container satu sama lain atau dengan dunia luar.

## 3. **Docker Registry**
- Tempat penyimpanan untuk Docker Images.
- Docker Hub adalah registry publik default.
- Mendukung pembuatan registry privat.

### Workflow Docker:
1. **Build**: Membangun image menggunakan Dockerfile.
2. **Push**: Mengunggah image ke registry (Docker Hub atau privat).
3. **Pull**: Mengunduh image dari registry.
4. **Run**: Membuat dan menjalankan container dari image.
