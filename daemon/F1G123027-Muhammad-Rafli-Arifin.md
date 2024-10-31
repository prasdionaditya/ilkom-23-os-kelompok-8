# Membuat Daemon Proses di Ubuntu

## 1. Deskripsi
Dokumentasi ini menjelaskan langkah-langkah untuk membuat dan mengonfigurasi daemon service di Ubuntu untuk menjalankan aplikasi Python.

## 2. Buat file .service
Masuk sebagai superuser di terminal, lalu jalankan perintah di bawah ini,
```
sudo nano /etc/systemd/system/rafli.service
```
### 2.1 Isi file service dengan konfigurasi berikut (sesuaikan path):
```
[Unit]
Description=Rafli Daemon
After=network.target

[Service]
User=rafli
WorkingDirectory=/home/rafli/myproject
Environment="PATH=/home/rafli/myproject/venv/bin"
ExecStart=/home/rafli/myproject/venv/bin/uvicorn main:app --host 0.0.0.0 --port 7080

Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
```


## 3. Menjalankan dan Menghentikan daemon service
```
- Reload daemon
sudo systemctl daemon-reload

- Enable service
sudo systemctl enable rafli.service

- Start service
sudo systemctl start rafli.service

- Cek status service
sudo systemctl status rafli.service

- Menghentikan service
sudo systemctl stop rafli.service
```


## 4. Screenshoot Daemon Berhasil 
## Tampilan Start Daemon Service 
![Bukti Screenshoot](https://drive.google.com/uc?id=1O6A2JAdGDNeA-_TS_HRGPe1SaqYAVTl4)

## Tampilan Website
![Bukti Screenshoot](https://drive.google.com/uc?id=1jpWJpuJW8p6skT9JdGJcGIrRg0Ilgm0r)

## Tampilan Stop Daemon Service
![Bukti Screenshoot](https://drive.google.com/uc?id=1r8EkdyMYIG2BOOPPnUDaDyCpOX70j8CJ)
