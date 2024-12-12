# Menghubungkan Container ke Jaringan

Docker memungkinkan container untuk dihubungkan ke jaringan tertentu. Berikut adalah langkah-langkah umum untuk menghubungkan container ke jaringan:

## 1. **Menentukan Jaringan Saat Membuat Container**
Anda dapat langsung menentukan jaringan saat membuat container menggunakan opsi `--network`.
- **Contoh**:
  ```bash
  docker run --network <network_name> --name my_container nginx
  ```

## 2. **Menghubungkan Container ke Jaringan yang Ada**
Jika container sudah dibuat, Anda dapat menambahkan container ke jaringan yang ada menggunakan perintah `docker network connect`.
- **Contoh**:
  ```bash
  docker network connect <network_name> <container_name>
  ```

  ## 3. **Memutuskan Container dari Jaringan**
Untuk memutuskan container dari jaringan, gunakan perintah `docker network disconnect`.
- **Contoh**:
  ```bash
  docker network disconnect <network_name> <container_name>
  ```

## 4. **Memeriksa Koneksi Jaringan pada Container**
Gunakan perintah `docker inspect` untuk memeriksa jaringan yang terhubung ke container.
- **Contoh**:
  ```bash
  docker inspect <container_name> | grep Network
  ```

## 5. **Menghubungkan Banyak Jaringan**
Satu container dapat terhubung ke lebih dari satu jaringan.