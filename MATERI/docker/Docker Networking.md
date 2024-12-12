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

  ## 4. **Overlay Network**
- **Deskripsi**:
  - Digunakan untuk menghubungkan container yang berjalan di beberapa host dalam cluster Docker Swarm.
  - Membutuhkan orkestrasi seperti Docker Swarm atau Kubernetes.
- **Kegunaan**:
  - Komunikasi antar-container di berbagai host.
- **Contoh**:
  ```bash
  docker network create -d overlay my_overlay_network
  docker service create --network my_overlay_network nginx
  ```

  ## 5. **Macvlan Network**
- **Deskripsi**:
  - Memberikan container alamat MAC unik dan memperlakukannya seperti perangkat fisik di jaringan.
  - Container dapat berkomunikasi langsung dengan jaringan fisik.
- **Kegunaan**:
  - Digunakan untuk integrasi yang lebih erat dengan jaringan fisik.
- **Contoh**:
  ```bash
  docker network create -d macvlan --subnet=192.168.1.0/24 my_macvlan
  docker run --network my_macvlan nginx
  ```

## 6. **Custom Network**
- **Deskripsi**:
  - Jaringan yang dibuat pengguna dengan konfigurasi khusus.
  - Biasanya berbasis bridge atau overlay.
- **Kegunaan**:
  - Digunakan untuk kebutuhan jaringan spesifik.
- **Contoh**:
  ```bash
  docker network create my_custom_network
  docker run --network my_custom_network nginx
  ```

  ## Perintah Umum untuk Jaringan Docker
1. **Melihat Daftar Jaringan**:
   ```bash
   docker network ls
   ```
2. **Membuat Jaringan Baru**:
   ```bash
   docker network create <network_name>
   ```
