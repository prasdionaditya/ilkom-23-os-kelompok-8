Berikut adalah panduan untuk membuat service daemon `aas.service` untuk menjalankan aplikasi FastAPI:

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
