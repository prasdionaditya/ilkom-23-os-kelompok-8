### **Docker Images**

**Docker Images** adalah template read-only yang digunakan untuk membuat kontainer Docker. Sebuah image berisi semua file sistem, aplikasi, dependensi, dan konfigurasi yang diperlukan untuk menjalankan sebuah aplikasi dalam kontainer. Docker images dapat dilihat sebagai cetak biru atau blueprint untuk kontainer.

#### **Fitur Utama Docker Images**
1. **Read-only**: Sebuah image adalah read-only, yang berarti file di dalamnya tidak bisa dimodifikasi saat kontainer berjalan. Namun, perubahan dapat dilakukan di layer kontainer saat kontainer berjalan, yang disebut layer writable.
2. **Layered File System**: Docker images disusun dalam lapisan (layers). Setiap perubahan atau penambahan file dalam image disimpan sebagai lapisan terpisah, yang memungkinkan untuk efisiensi penyimpanan dan pengunduhan image.
3. **Reusable**: Docker images dapat digunakan ulang. Setelah sebuah image dibangun, image tersebut dapat digunakan untuk membuat banyak kontainer tanpa perlu membangun ulang dari awal.
4. **Portability**: Docker images bersifat portable dan dapat dipindahkan antar sistem yang memiliki Docker tanpa perubahan konfigurasi, sehingga dapat dijalankan di berbagai lingkungan (development, testing, production).

#### **Membuat Docker Image**
Docker image dapat dibuat menggunakan file yang disebut **Dockerfile**. Dockerfile adalah file teks yang berisi instruksi untuk membangun image, seperti memilih image dasar, menambahkan file ke dalam image, dan menjalankan perintah dalam kontainer.

Contoh sederhana **Dockerfile**:
```Dockerfile
# Pilih image dasar
FROM ubuntu:latest

# Install paket
RUN apt-get update && apt-get install -y python3

# Salin file dari sistem lokal ke dalam kontainer
COPY . /app

# Tentukan direktori kerja
WORKDIR /app

# Tentukan perintah yang dijalankan saat kontainer mulai
CMD ["python3", "app.py"]
```

Untuk membuat image dari Dockerfile ini, jalankan perintah:
```bash
docker build -t my-python-app .
```

#### **Menarik dan Menggunakan Docker Images**
Untuk menarik image dari Docker Hub (repositori image Docker resmi), gunakan perintah berikut:
```bash
docker pull ubuntu
```

Setelah image berhasil diunduh, Anda dapat menjalankannya dengan perintah:
```bash
docker run -it ubuntu
```

#### **Menampilkan Docker Images yang Ada**
Untuk melihat daftar image yang tersedia di sistem lokal Anda, gunakan perintah:
```bash
docker images
```

Output akan menampilkan informasi tentang image yang terpasang, seperti:
- **REPOSITORY**: Nama image.
- **TAG**: Versi atau label image.
- **IMAGE ID**: ID unik dari image.
- **CREATED**: Waktu pembuatan image.
- **SIZE**: Ukuran image.

#### **Menghapus Docker Images**
Untuk menghapus image yang tidak dibutuhkan, gunakan perintah:
```bash
docker rmi <image_id>
```

#### **Docker Hub**
**Docker Hub** adalah layanan repositori untuk menyimpan dan berbagi Docker images. Ini adalah tempat utama untuk menarik (pull) dan mendorong (push) Docker images. Anda bisa mencari berbagai image yang sudah ada di Docker Hub, misalnya untuk aplikasi seperti PostgreSQL, Nginx, atau Redis.

Contoh perintah untuk menarik image dari Docker Hub:
```bash
docker pull nginx
```

#### **Tagging Docker Images**
Setiap image memiliki tag yang digunakan untuk mengidentifikasinya. Anda dapat menambahkan atau mengubah tag dengan perintah `docker tag`:
```bash
docker tag <image_id> <new_name>:<tag>
```

Misalnya:
```bash
docker tag my-python-app myrepo/my-python-app:v1
```

#### **Keuntungan Menggunakan Docker Images**
- **Portabilitas**: Docker images dapat dijalankan di sistem manapun yang mendukung Docker tanpa perlu khawatir tentang perbedaan lingkungan.
- **Efisiensi**: Karena Docker images dibangun dalam lapisan, perubahan hanya mempengaruhi lapisan yang relevan, yang mengurangi duplikasi data dan meningkatkan efisiensi.
- **Konsistensi**: Docker images memastikan aplikasi berjalan dengan cara yang sama di semua lingkungan, baik itu lokal, staging, atau produksi.

#### **Kesimpulan**
Docker images adalah komponen inti dalam ekosistem Docker yang memungkinkan aplikasi berjalan di kontainer. Dengan menggunakan images yang sudah terstandarisasi, pengembang dapat memastikan aplikasi mereka berjalan secara konsisten di berbagai lingkungan.