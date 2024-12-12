### Hypervisor

**Hypervisor** adalah perangkat lunak atau firmware yang memungkinkan pembuatan dan menjalankan mesin virtual (VM) pada satu perangkat keras fisik. Hypervisor bertindak sebagai pengelola sumber daya fisik seperti CPU, memori, dan perangkat I/O, serta mendistribusikannya ke VM secara efisien dan aman. 

### Jenis-jenis Hypervisor
1. **Hypervisor Tipe 1 (Bare-Metal)**  
   Berjalan langsung di atas perangkat keras fisik tanpa memerlukan sistem operasi host. Contoh:  
   - VMware ESXi  
   - Microsoft Hyper-V  
   - Xen  

2. **Hypervisor Tipe 2 (Hosted)**  
   Berjalan di atas sistem operasi host dan bergantung pada OS tersebut untuk mengakses perangkat keras. Contoh:  
   - VMware Workstation  
   - Oracle VirtualBox  
   - QEMU  

### Fungsi Hypervisor
- **Isolasi**: Memisahkan setiap mesin virtual untuk keamanan dan stabilitas.
- **Manajemen Sumber Daya**: Mengalokasikan sumber daya seperti CPU, memori, dan penyimpanan ke setiap VM sesuai kebutuhan.
- **Migrasi**: Memungkinkan migrasi VM antar server tanpa downtime (live migration).
- **Abstraksi**: Menyediakan abstraksi perangkat keras, sehingga VM dapat berjalan tanpa mengetahui detail perangkat keras fisik.

### Kelebihan Hypervisor
- **Efisiensi Sumber Daya**: Memungkinkan penggunaan sumber daya perangkat keras secara optimal.
- **Konsolidasi Server**: Mengurangi kebutuhan akan perangkat keras fisik dengan menjalankan beberapa VM pada satu server.
- **Skalabilitas**: Memudahkan penambahan atau pengurangan VM sesuai kebutuhan.

### Kekurangan Hypervisor
- **Overhead Kinerja**: Menjalankan banyak VM dapat menyebabkan penurunan kinerja jika tidak diatur dengan baik.
- **Kompleksitas Manajemen**: Membutuhkan keterampilan khusus untuk mengelola infrastruktur virtual.

```md
# Hypervisor

## Pengertian
Hypervisor adalah perangkat lunak atau firmware yang memungkinkan pembuatan dan pengelolaan mesin virtual (VM) dengan membagi sumber daya perangkat keras fisik. Hypervisor menyediakan isolasi dan abstraksi sehingga setiap VM dapat berjalan secara independen.

## Jenis Hypervisor
- **Tipe 1 (Bare-Metal)**: Berjalan langsung di atas perangkat keras fisik, tanpa OS host.
- **Tipe 2 (Hosted)**: Berjalan di atas sistem operasi host.

## Kelebihan
- Efisiensi sumber daya
- Konsolidasi server
- Skalabilitas

## Kekurangan
- Overhead kinerja
- Kompleksitas manajemen
```