# Cara Menggunakan Menggunakan Docker melalui WSL (Windows Subsystem for Linux)

Dokumentasi ini mencakup langkah-langkah konfigurasi Docker menggunakan WSL, termasuk inisiasi Docker image, menjalankan container, serta langkah-langkah bedah container dan optimasi resource.

---

## 1. Inisiasi Docker Image Menggunakan Dockerfile

Untuk membuat Docker image menggunakan Dockerfile, ikuti langkah-langkah berikut:

### **Langkah 1: Install Docker pada WSL**
1. **Install Docker di WSL**:
   - Pastikan Anda sudah menginstal WSL 2 dan mengonfigurasi distribusi Linux yang sesuai.
   - Instal Docker Desktop untuk Windows melalui https://www.docker.com, yang akan mengintegrasikan Docker dengan WSL.
   
2. **Verifikasi Instalasi**:
   Jalankan perintah berikut untuk memverifikasi apakah Docker sudah terinstal dan berjalan:
   ```bash
   docker --version
   ```
   Output:

   ![deskripsi](screenshots/docker-version.png)

### **Langkah 2: Membuat Dockerfile**
1. **Buat sebuah direktori baru untuk proyek Docker Anda**:
   ```bash
   mkdir my-docker-project
   cd my-docker-project
   ```

2. **Buat file `Dockerfile`**:
   Di dalam direktori proyek, buat file bernama `Dockerfile` dengan cara:
   ```bash
   touch Dockerfile
   ```
   Setelah itu, edit Dockerfile tersebut dengan cara:
   ```bash
   nano Dockerfile
   ```
   setelah masuk ke dalam editor, isi file `Dockerfile` sesuai kebutuhan project, contohnya sebagai berikut:
   ```dockerfile
   #Gunakan PHP 8.2 dengan Apache
    FROM php:8.2-apache

    #Salin file PHP ke direktori yang sesuai di dalam container
    COPY ./php /var/www/html

    #Expose port 80 untuk Apache
    EXPOSE 80
   ```
    Output:

    ![editdockerfile](screenshots/edit-dockerfile.png)
### **Langkah 3: Membangun Docker Image**
Setelah Dockerfile selesai dibuat, bangun image dengan perintah:
```bash
docker build -t my-ubuntu-image .
```
Perintah ini akan membaca Dockerfile dan membuat image baru dengan nama `my-ubuntu-image`.

---

## 2. Menjalankan Container dari Docker Image

Untuk menjalankan container dari image yang telah dibuat, gunakan perintah `docker run`:

### **Langkah 1: Menjalankan Container**
Jalankan container menggunakan perintah berikut:
```bash
docker run -it my-ubuntu-image
```
Perintah ini akan menjalankan container dalam mode interaktif (`-it`) dan memulai shell `bash` di dalam container. Anda bisa mulai bekerja di dalamnya.

### **Langkah 2: Memverifikasi Container yang Berjalan**
Untuk memverifikasi apakah container sedang berjalan, gunakan:
```bash
docker ps
```

---

## 3. Bedah Container

Berikut adalah beberapa command yang bisa digunakan untuk "bedah" container dan mengeksplorasi file-system atau konfigurasi di dalamnya:

### **1. Melihat Daftar Perangkat di `/dev/`**
Untuk melihat daftar perangkat yang tersedia di dalam container, jalankan:
```bash
docker exec -it [container_id] ls /dev/
```

### **2. Melihat Versi Sistem Operasi**
Untuk melihat informasi tentang distribusi Linux yang digunakan dalam container, jalankan:
```bash
docker exec -it [container_id] cat /etc/os-release
```

### **3. Menampilkan Informasi Kernel**
Untuk melihat informasi kernel dari container, jalankan:
```bash
docker exec -it [container_id] uname -a
```

### **4. Melihat Konfigurasi Jaringan**
Untuk memeriksa konfigurasi jaringan dalam container:
```bash
docker exec -it [container_id] ifconfig
```

### **5. Melihat Proses yang Sedang Berjalan**
Untuk melihat daftar proses yang sedang berjalan dalam container:
```bash
docker exec -it [container_id] ps aux
```

---

## 4. Optimasi Resources

Docker memungkinkan pengaturan penggunaan resource seperti CPU dan memori agar lebih efisien. Berikut adalah beberapa cara untuk mengoptimalkan resource saat menjalankan container:

### **1. Membatasi Penggunaan CPU**
Anda bisa membatasi jumlah CPU yang digunakan oleh container menggunakan flag `--cpus`:
```bash
docker run -it --cpus="1.5" my-ubuntu-image
```
Perintah ini akan membatasi container untuk hanya menggunakan 1.5 core CPU.

### **2. Membatasi Penggunaan Memori**
Gunakan flag `--memory` untuk membatasi penggunaan memori:
```bash
docker run -it --memory="1g" my-ubuntu-image
```
Perintah ini akan membatasi container untuk menggunakan maksimum 1GB memori.

### **3. Menyesuaikan Swap Memory**
Untuk membatasi penggunaan swap memory, gunakan flag `--memory-swap`:
```bash
docker run -it --memory="1g" --memory-swap="2g" my-ubuntu-image
```
Perintah ini akan membatasi penggunaan memori fisik hingga 1GB dan swap hingga 2GB.

### **4. Menetapkan Prioritas I/O**
Untuk membatasi penggunaan I/O disk, gunakan flag `--blkio-weight`:
```bash
docker run -it --blkio-weight=500 my-ubuntu-image
```
Perintah ini menetapkan prioritas I/O container, di mana nilai lebih tinggi berarti lebih banyak prioritas.

---

