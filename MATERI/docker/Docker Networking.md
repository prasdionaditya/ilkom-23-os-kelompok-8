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