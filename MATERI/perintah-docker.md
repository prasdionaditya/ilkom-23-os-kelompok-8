### **1. Command untuk Mengelola Docker**
- `docker --version`: Menampilkan versi Docker yang diinstal.
- `docker info`: Memberikan informasi umum tentang Docker dan sistemnya.
- `docker help`: Menampilkan daftar command yang tersedia di Docker.

### **2. Command untuk Mengelola Container**
- `docker run [options] [image]`: Membuat dan menjalankan container baru dari sebuah image.
- `docker start [container_id/container_name]`: Menjalankan container yang sudah ada.
- `docker stop [container_id/container_name]`: Menghentikan container yang sedang berjalan.
- `docker restart [container_id/container_name]`: Me-restart container.
- `docker rm [container_id/container_name]`: Menghapus container yang sudah ada.
- `docker ps`: Melihat daftar container yang sedang berjalan.
- `docker ps -a`: Melihat semua container (termasuk yang sudah berhenti).
- `docker logs [container_id/container_name]`: Menampilkan log dari container.
- `docker exec [container_id/container_name] [command]`: Menjalankan perintah di dalam container yang sedang berjalan.
- `docker attach [container_id/container_name]`: Terhubung ke container yang sedang berjalan.

### **3. Command untuk Mengelola Image**
- `docker pull [image:tag]`: Mendownload image dari Docker Hub.
- `docker images`: Melihat daftar image yang tersedia di lokal.
- `docker build -t [name:tag] [path]`: Membuat image baru dari file Dockerfile.
- `docker rmi [image_id/image_name]`: Menghapus image dari lokal.
- `docker tag [image_id] [new_name:tag]`: Memberikan nama/tag baru ke sebuah image.
- `docker push [name:tag]`: Mengupload image ke Docker Hub.

### **4. Command untuk Mengelola Volume**
- `docker volume create [volume_name]`: Membuat volume baru.
- `docker volume ls`: Menampilkan daftar volume.
- `docker volume inspect [volume_name]`: Melihat detail informasi volume.
- `docker volume rm [volume_name]`: Menghapus volume yang tidak lagi digunakan.

### **5. Command untuk Mengelola Network**
- `docker network ls`: Menampilkan daftar jaringan yang tersedia.
- `docker network create [network_name]`: Membuat jaringan baru.
- `docker network inspect [network_name]`: Melihat detail jaringan.
- `docker network rm [network_name]`: Menghapus jaringan yang tidak digunakan.

### **6. Command untuk Mengelola Docker Compose**
- `docker-compose up`: Menjalankan aplikasi yang didefinisikan dalam file `docker-compose.yml`.
- `docker-compose down`: Menghentikan dan menghapus container yang dibuat dengan Docker Compose.
- `docker-compose ps`: Menampilkan daftar container yang dikelola oleh Docker Compose.
- `docker-compose logs`: Melihat log dari container dalam Docker Compose.

### **7. Command untuk Troubleshooting**
- `docker inspect [container_id/image_id]`: Menampilkan detail tentang container atau image.
- `docker stats`: Menampilkan statistik penggunaan sumber daya (CPU, RAM) dari container.
- `docker top [container_id/container_name]`: Melihat proses yang sedang berjalan dalam container.
- `docker events`: Melihat event real-time dari Docker daemon.

### **8. Command Lainnya**
- `docker save -o [file_name.tar] [image_name]`: Menyimpan image dalam bentuk file tar.
- `docker load -i [file_name.tar]`: Memuat image dari file tar.
- `docker export -o [file_name.tar] [container_name]`: Mengekspor container ke file tar.
- `docker import [file_name.tar]`: Mengimpor file tar menjadi image.