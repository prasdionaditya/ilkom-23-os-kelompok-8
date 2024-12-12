# Jenis Jaringan Docker

Docker menyediakan berbagai jenis jaringan untuk mendukung kebutuhan komunikasi antar-container, dengan host, atau dengan dunia luar. Berikut adalah jenis-jenis jaringan yang tersedia di Docker:

## 1. **Bridge Network** (Default)
- **Deskripsi**:
  - Jaringan default yang digunakan ketika container dibuat tanpa spesifikasi jaringan tertentu.
  - Menggunakan jaringan virtual internal untuk menghubungkan container dalam host yang sama.
- **Kegunaan**:
  - Digunakan untuk komunikasi antar-container pada host yang sama.
- **Contoh**:
  ```bash
  docker network ls  # Melihat daftar jaringan
  docker network inspect bridge  # Melihat detail jaringan bridge
  docker run --network bridge nginx
  ```

  ## 2. **Host Network**
- **Deskripsi**:
  - Container menggunakan jaringan host secara langsung.
  - Tidak ada isolasi jaringan antara container dan host.
- **Kegunaan**:
  - Digunakan ketika performa tinggi diperlukan atau port forwarding tidak diinginkan.
- **Catatan**:
  - Hanya tersedia di Linux.
- **Contoh**:
  ```bash
  docker run --network host nginx
  ``` 

  ## 3. **None Network**
- **Deskripsi**:
  - Container tidak terhubung ke jaringan apapun.
  - Container tetap aktif tetapi tidak memiliki akses jaringan.
- **Kegunaan**:
  - Digunakan untuk menjalankan aplikasi yang tidak membutuhkan jaringan.
- **Contoh**:
  ```bash
  docker run --network none nginx
  ```
  