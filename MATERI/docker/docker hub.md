# **Docker Hub**

Docker Hub adalah layanan repositori berbasis cloud untuk menyimpan, berbagi, dan mendistribusikan Docker Images. Ini adalah platform default yang digunakan oleh Docker untuk mengelola image secara online. Dengan Docker Hub, pengguna dapat mengunduh image siap pakai, mengunggah image buatan sendiri, dan berbagi image dengan tim atau komunitas.

## **Fitur Utama Docker Hub**
   1. **Repositori Publik dan Privat**
      - Publik: Dapat diakses oleh semua pengguna Docker. Cocok untuk berbagi image open-source.
      - Privat: Hanya dapat diakses oleh pengguna atau tim tertentu. Cocok untuk aplikasi internal.
   2. Image Resmi (Official Images)
      - Docker Hub menyediakan image resmi yang dikelola oleh Docker atau vendor pihak ketiga (seperti `nginx`, `mysql`, `python`).
      - Image ini telah diuji dan dianggap aman untuk digunakan.
   3. Organisasi dan Tim
      - Fitur ini memungkinkan pengelolaan kolaboratif repositori dengan akses berbasis peran untuk tim dalam organisasi.
   4. Automated Builds
      - Docker Hub dapat diintegrasikan dengan sistem kontrol versi seperti GitHub atau Bitbucket. Ketika ada pembaruan pada repositori kode, image akan secara otomatis dibuat dan diperbarui.
   5. Webhooks
      - Mengirim notifikasi atau memicu tindakan otomatis setelah image diunggah atau diperbarui.

## **Manfaat Docker Hub**
   - Akses Mudah ke Image: Pengguna dapat mencari dan mengunduh image dari ribuan repositori publik.
   - Kolaborasi: Memungkinkan tim berbagi image dengan mudah.
   - Automasi: Mendukung integrasi dengan CI/CD untuk proses build dan deploy otomatis.
   - Keamanan: Image resmi diverifikasi dan lebih terpercaya.

## **Menggunakan Docker Hub**
   1. Login ke Docker Hub
   Untuk mulai menggunakan Docker Hub, Anda harus masuk menggunakan akun Docker:
   ```bash
   docker login
   ```
   2. Mencari Image
   Untuk mencari image yang tersedia di Docker Hub:
   ```bash
   docker search nginx
   ```
   3. Mengunduh Image
   Untuk mengunduh image dari Docker Hub:
   ```bash
   docker pull nginx
   ```
   Image ini akan disimpan di mesin lokal Anda.
   4. Mengunggah Image
   Jika Anda membuat image sendiri dan ingin mengunggahnya ke Docker Hub:
       1. Beri tag image dengan nama repositori Anda:
   ```bash
   docker tag my-image username/my-repo
   ```
       2. Unggah image ke Docker Hub:
   ```bash
   docker push username/my-repo
   ```
   5. Membuat Repositori
   Anda bisa membuat repositori baru langsung di situs Docker Hub:
   - Masuk ke Docker Hub.
   - Klik Create Repository.
   - Tentukan nama repositori dan visibilitasnya (publik/privat).
