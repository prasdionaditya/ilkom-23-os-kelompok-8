Berikut adalah **langkah-langkah instalasi Docker di Linux (Ubuntu/Debian)** secara rinci:

### **Instalasi Docker di Linux (Ubuntu/Debian)**

#### Langkah-langkah:

1. **Update Paket Sistem**
   Sebelum menginstal Docker, pastikan sistem sudah diperbarui dengan paket-paket terbaru:
   ```bash
   sudo apt update
   ```

2. **Instalasi Dependensi yang Dibutuhkan**
   Docker membutuhkan beberapa paket dependensi. Install paket-paket berikut terlebih dahulu:
   ```bash
   sudo apt install apt-transport-https ca-certificates curl software-properties-common
   ```

3. **Tambahkan GPG Key Docker**
   Docker menggunakan GPG key untuk memastikan integritas paket yang diunduh. Jalankan perintah berikut untuk menambahkan GPG key Docker:
   ```bash
   curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
   ```

4. **Tambahkan Repository Docker ke Sistem**
   Setelah menambahkan GPG key, tambahkan repository Docker ke sumber paket apt:
   ```bash
   sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
   ```

5. **Perbarui Daftar Paket dan Instal Docker**
   Setelah repository Docker ditambahkan, jalankan perintah berikut untuk memperbarui daftar paket dan menginstal Docker:
   ```bash
   sudo apt update
   sudo apt install docker-ce
   ```

6. **Verifikasi Instalasi Docker**
   Setelah instalasi selesai, verifikasi apakah Docker sudah terinstal dengan benar dengan menjalankan:
   ```bash
   sudo docker --version
   ```

   Perintah ini akan menampilkan versi Docker yang telah terinstal, contohnya:
   ```bash
   Docker version 20.10.7, build f0df350
   ```

7. **Menjalankan Docker Tanpa Sudo (Opsional)**
   Secara default, Docker membutuhkan hak akses root untuk menjalankan perintah. Jika ingin menjalankan Docker tanpa menggunakan `sudo` setiap kali, tambahkan pengguna Anda ke grup `docker`:
   ```bash
   sudo usermod -aG docker $USER
   ```

   Setelah itu, logout dan login kembali, atau jalankan perintah berikut untuk mengganti grup pengguna:
   ```bash
   newgrp docker
   ```

8. **Cek Status Docker**
   Periksa status Docker untuk memastikan layanan Docker berjalan dengan baik:
   ```bash
   sudo systemctl status docker
   ```

   Jika Docker berjalan dengan benar, Anda akan melihat output yang menunjukkan bahwa Docker sedang aktif dan berjalan.

9. **Test Docker dengan Menjalankan Kontainer**
   Untuk memastikan Docker berfungsi dengan baik, coba jalankan kontainer `hello-world` yang disediakan oleh Docker:
   ```bash
   docker run hello-world
   ```

   Jika berhasil, Anda akan melihat pesan yang menunjukkan bahwa Docker berhasil dijalankan dan kontainer `hello-world` berhasil diunduh dan dijalankan.

---

Dengan mengikuti langkah-langkah di atas, Docker akan berhasil diinstal dan siap digunakan di sistem Linux (Ubuntu/Debian).