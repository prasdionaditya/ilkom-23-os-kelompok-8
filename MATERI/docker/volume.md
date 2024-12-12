# **Docker Volume**

Docker Volume adalah mekanisme untuk menyimpan data di luar container. Volume memungkinkan data tetap ada meskipun container dihentikan atau dihapus, sehingga sangat berguna untuk penyimpanan data yang tahan lama.

---

## Mengapa Menggunakan Volume?

1. **Persistensi Data**  
   Data tetap ada meskipun container dihapus.

2. **Berbagi Data**  
   Volume dapat digunakan oleh beberapa container sekaligus.

3. **Performa yang Lebih Baik**  
   Volume dioptimalkan oleh Docker, sehingga lebih cepat dibandingkan bind mounts.

4. **Manajemen Mudah**  
   Volume dikelola oleh Docker, sehingga mudah diatur dan dipindahkan.

---

## Jenis Volume

1. **Volume (Docker Managed)**  
   - Dikelola sepenuhnya oleh Docker.  
   - Data disimpan di direktori sistem Docker (`/var/lib/docker/volumes/`).

2. **Bind Mount**  
   - Menghubungkan direktori atau file di sistem host langsung ke dalam container.  
   - Cocok untuk akses langsung ke file di host.

3. **tmpfs Mount**  
   - Data hanya disimpan di memori (RAM) dan hilang setelah container dihentikan.  
   - Cocok untuk data sementara.

---

## Perintah Docker Terkait Volume

- **Membuat Volume**  
  ```bash
  docker volume create my-volume
  ```

- **Melihat Daftar Volume**  
  ```bash
  docker volume ls
  ```

- **Menghapus Volume**  
  ```bash
  docker volume rm my-volume
  ```

- **Membersihkan Volume yang Tidak Digunakan**  
  ```bash
  docker volume prune
  ```

---

## Menggunakan Volume dalam Container

### 1. Menambahkan Volume ke Container
```bash
docker run -d -v my-volume:/app/data my-container
```
- `my-volume`: Nama volume di host.
- `/app/data`: Lokasi di dalam container tempat volume di-mount.

### 2. Menggunakan Bind Mount
```bash
docker run -d -v /my/local/path:/app/data my-container
```
- `/my/local/path`: Direktori di sistem host.
- `/app/data`: Lokasi di dalam container.

### 3. Menggunakan tmpfs Mount
```bash
docker run -d --mount type=tmpfs,destination=/app/cache my-container
```
- Data hanya disimpan di memori.

---

## Contoh Kasus Penggunaan Volume

### 1. Menggunakan Volume untuk Database
```bash
docker volume create db-data
docker run -d -v db-data:/var/lib/mysql mysql
```
Volume `db-data` menyimpan data MySQL sehingga tidak hilang meskipun container dihapus.

### 2. Berbagi Data Antar Container
```bash
docker run -d -v shared-data:/app/data container1
docker run -d -v shared-data:/app/data container2
```
Kedua container dapat mengakses data yang sama melalui volume `shared-data`.

---

## Keunggulan Volume Dibandingkan Bind Mount

| **Aspek**          | **Volume**                 | **Bind Mount**            |
|---------------------|----------------------------|---------------------------|
| **Manajemen**       | Dikelola oleh Docker      | Dikelola manual           |
| **Portabilitas**    | Lebih mudah dipindahkan   | Tergantung pada direktori host |
| **Keamanan**        | Lebih aman dan terisolasi | Bergantung pada izin sistem host |
| **Performa**        | Dioptimalkan oleh Docker  | Performa standar          |