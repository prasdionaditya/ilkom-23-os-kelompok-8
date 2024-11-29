### Pengertian Container

**Container** adalah unit perangkat lunak yang mengemas kode aplikasi dan semua dependensinya (seperti pustaka, file konfigurasi, dan binari) ke dalam satu paket. Ini memastikan aplikasi berjalan secara konsisten di berbagai lingkungan, mulai dari pengembangan hingga produksi. Container bekerja dengan menggunakan kernel sistem operasi yang sama, tetapi diisolasi satu sama lain.

### Prinsip Kerja
Container berjalan di atas **engine** seperti Docker atau Podman. Engine ini memanfaatkan fitur **virtualisasi di tingkat OS** untuk menjalankan beberapa container di satu host fisik atau virtual tanpa memerlukan hypervisor seperti pada mesin virtual (VM). Container lebih ringan dibandingkan VM karena mereka berbagi kernel dengan host.

### Keuntungan Container
- **Portabilitas**: Aplikasi dapat dijalankan di berbagai lingkungan tanpa perubahan konfigurasi.
- **Isolasi**: Setiap container terisolasi sehingga tidak saling mengganggu.
- **Efisiensi Sumber Daya**: Container menggunakan lebih sedikit sumber daya dibandingkan VM.
- **Peningkatan Pengembangan dan Deployment**: Memungkinkan penerapan praktik DevOps dan CI/CD yang lebih efisien.

### Kekurangan Container
- **Keamanan**: Berbagi kernel dengan host dapat menjadi potensi risiko keamanan.
- **Kompleksitas Orkestrasi**: Memerlukan alat seperti Kubernetes untuk mengelola container dalam skala besar.

### Contoh Penggunaan
- **Docker** adalah platform container yang populer untuk membuat, mendistribusikan, dan menjalankan container.
- **Kubernetes** digunakan untuk orkestrasi container dalam lingkungan yang kompleks dan terdistribusi.

```md
# Container
Container adalah unit perangkat lunak yang mengemas kode aplikasi beserta semua dependensinya agar dapat berjalan konsisten di berbagai lingkungan. Mereka bekerja dengan memanfaatkan virtualisasi tingkat OS dan menyediakan isolasi yang ringan dibandingkan dengan virtual machine (VM). Docker dan Kubernetes adalah contoh teknologi yang mendukung penggunaan container.

## Keuntungan
- Portabilitas
- Isolasi
- Efisiensi sumber daya
- Mendukung DevOps dan CI/CD

## Kekurangan
- Potensi risiko keamanan
- Kompleksitas dalam orkestrasi
```