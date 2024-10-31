Berikut adalah panduan untuk membuat service daemon `aas.service` :

# Panduan Pembuatan Daemon Process untuk almunajat.service

Pada panduan ini, saya akan menjelaskan langkah-langkah untuk membuat proses daemon dengan `systemd` untuk aplikasi FastAPI.

## Buat File .service
Masuk sebagai superuser, lalu jalankan perintah berikut untuk membuat file service:

```bash
$ sudo touch /etc/systemd/system/aas.service
```

## Penulisan Script Konfigurasi .service
Buka file `aas.service` yang baru saja dibuat, kemudian tambahkan konfigurasi berikut:

```ini
[Unit]
Description=Contoh Daemon

[Service]
Restart=always
WorkingDirectory=/home/aas
Environment="PYTHONPATH=/home/aas"
ExecStart=/home/aas/venv/bin/uvicorn main:app --reload --port 7080

[Install]
WantedBy=multi-user.target
```

> **Catatan:**
> - Pastikan `User` dan `WorkingDirectory` sesuai dengan konfigurasi direktori dan user pada sistem kamu.
> - `ExecStart` diarahkan ke environment Python yang sudah diaktifkan (`venv`) dan menjalankan Uvicorn untuk aplikasi FastAPI pada `main.py`.

## Jalankan Perintah Daemon

Setelah menyimpan konfigurasi di file `almunajat.service`, jalankan perintah berikut untuk mengaktifkan dan memulai daemon:

```bash
$ sudo systemctl daemon-reload
$ sudo systemctl start aas.service
$ sudo systemctl status aas.service
```

