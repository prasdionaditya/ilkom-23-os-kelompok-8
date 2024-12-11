### **Docker Containers**

**Docker Containers** adalah unit terkecil dalam sistem Docker yang memungkinkan Anda menjalankan aplikasi dalam lingkungan yang terisolasi dan terstandarisasi. Setiap kontainer mengemas aplikasi dengan semua dependensinya, seperti pustaka dan konfigurasi, sehingga aplikasi dapat berjalan konsisten di berbagai lingkungan.

#### **Apa itu Docker Container?**
Docker container adalah instansiasi dari Docker image. Ketika Anda menjalankan perintah `docker run`, Docker membuat kontainer berdasarkan image yang sudah ada. Kontainer adalah lingkungan runtime untuk aplikasi yang terisolasi dari sistem host.

Contoh sederhana, jika Anda memiliki image Ubuntu, menjalankan image tersebut akan menghasilkan kontainer dengan sistem operasi Ubuntu yang siap digunakan.

#### **Fitur Utama Docker Containers**
1. **Isolasi**: Kontainer memiliki ruang terisolasi yang menjalankan aplikasi dan dependensinya, terpisah dari sistem host dan kontainer lain.
2. **Portabilitas**: Kontainer dapat dipindahkan antar lingkungan, seperti development, staging, dan production, tanpa perubahan konfigurasi.
3. **Ringan dan Cepat**: Kontainer lebih efisien daripada mesin virtual karena tidak membawa seluruh sistem operasi, hanya aplikasi dan dependensinya.
4. **Efisiensi Sumber Daya**: Kontainer berbagi kernel host, yang mengurangi overhead dan memungkinkan banyak kontainer berjalan pada sistem yang sama.
5. **Konsistensi**: Kontainer memastikan aplikasi berjalan dengan cara yang sama di berbagai lingkungan, menghindari masalah "works on my machine".

#### **Perintah Dasar untuk Mengelola Docker Containers**

1. **Menjalankan Kontainer**  
   Untuk menjalankan sebuah kontainer dari image:
   ```bash
   docker run -it ubuntu
   ```
   Perintah ini akan menjalankan sebuah kontainer berbasis image `ubuntu` dan membuka terminal interaktif di dalam kontainer.

2. **Menjalankan Kontainer dengan Nama**  
   Anda dapat memberi nama kontainer agar mudah dikenali:
   ```bash
   docker run -it --name my-ubuntu ubuntu
   ```

3. **Menjalankan Kontainer di Background (Detached Mode)**  
   Untuk menjalankan kontainer di background, gunakan flag `-d`:
   ```bash
   docker run -d ubuntu
   ```
   Kontainer akan berjalan di latar belakang dan memberikan ID kontainer.

4. **Melihat Daftar Kontainer yang Sedang Berjalan**  
   Untuk melihat kontainer yang sedang berjalan, gunakan perintah:
   ```bash
   docker ps
   ```

5. **Melihat Semua Kontainer (Termasuk yang Sudah Berhenti)**  
   Untuk melihat kontainer yang aktif maupun yang sudah dihentikan:
   ```bash
   docker ps -a
   ```

6. **Masuk ke Kontainer yang Sedang Berjalan (Attach)**  
   Untuk masuk ke terminal kontainer yang sedang berjalan:
   ```bash
   docker exec -it <container_id_or_name> bash
   ```

7. **Menghentikan Kontainer**  
   Untuk menghentikan kontainer yang sedang berjalan:
   ```bash
   docker stop <container_id_or_name>
   ```

8. **Menghapus Kontainer**  
   Setelah menghentikan kontainer, Anda dapat menghapusnya dengan:
   ```bash
   docker rm <container_id_or_name>
   ```

9. **Menjalankan Kontainer dengan Port Binding**  
   Jika aplikasi di dalam kontainer membutuhkan akses dari luar (misalnya, aplikasi web), Anda dapat memetakan port host ke port kontainer:
   ```bash
   docker run -p 8080:80 nginx
   ```
   Perintah ini akan memetakan port 8080 di host ke port 80 di kontainer yang menjalankan server Nginx.

10. **Menggunakan Volume untuk Data Persisten**  
    Untuk menjaga data tetap ada meskipun kontainer dihentikan atau dihapus, Anda bisa menggunakan volume:
    ```bash
    docker run -v /path/on/host:/path/in/container ubuntu
    ```

#### **Docker Container Lifecycle**
1. **Build**: Pertama, Anda membuat image yang menjadi dasar untuk kontainer.
2. **Run**: Anda menjalankan kontainer dari image dengan perintah `docker run`.
3. **Stop**: Kontainer dapat dihentikan dengan perintah `docker stop`.
4. **Restart**: Kontainer dapat di-restart menggunakan `docker restart`.
5. **Remove**: Setelah tidak diperlukan lagi, kontainer bisa dihapus dengan `docker rm`.

#### **Mengelola Kontainer dengan Docker Compose**
Jika Anda bekerja dengan beberapa kontainer (misalnya aplikasi dengan database), Docker Compose memungkinkan Anda untuk mendefinisikan dan menjalankan multi-kontainer aplikasi dalam file YAML. Ini membantu menyederhanakan pengelolaan kontainer yang saling bergantung.

Contoh **docker-compose.yml**:
```yaml
version: '3'
services:
  web:
    image: nginx
    ports:
      - "8080:80"
  db:
    image: postgres
    environment:
      POSTGRES_PASSWORD: example
```

Untuk menjalankan kontainer menggunakan Docker Compose:
```bash
docker-compose up
```

#### **Docker Container vs Virtual Machine**
- **Kontainer**: Lebih ringan dan cepat karena tidak memerlukan sistem operasi penuh. Mereka berbagi kernel sistem host dan hanya berisi aplikasi dan dependensinya.
- **Mesin Virtual (VM)**: Menjalankan sistem operasi lengkap dan aplikasi, yang membutuhkan lebih banyak sumber daya karena adanya virtualisasi hardware penuh.

#### **Keuntungan Menggunakan Docker Containers**
- **Portabilitas**: Aplikasi yang dikemas dalam kontainer dapat dijalankan di mana saja (lokal, server, cloud).
- **Konsistensi**: Penggunaan Docker menghindari masalah "it works on my machine" dengan memastikan aplikasi berperilaku sama di berbagai lingkungan.
- **Efisiensi**: Kontainer lebih efisien dalam hal sumber daya dibandingkan mesin virtual karena berbagi kernel.
- **Skalabilitas**: Kontainer dapat dengan mudah diskalakan untuk menangani lebih banyak trafik, sangat cocok untuk arsitektur berbasis microservices.

#### **Kesimpulan**
Docker containers adalah cara yang efisien dan portable untuk menjalankan aplikasi dalam lingkungan yang terisolasi. Mereka memungkinkan pengembang untuk memastikan bahwa aplikasi berjalan dengan cara yang sama di berbagai lingkungan, sambil memanfaatkan efisiensi sumber daya. Kontainer ini sangat berguna dalam pengembangan, pengujian, dan deployment aplikasi, dan dapat dikelola lebih lanjut menggunakan alat seperti Docker Compose untuk orkestrasi multi-kontainer.