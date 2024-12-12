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