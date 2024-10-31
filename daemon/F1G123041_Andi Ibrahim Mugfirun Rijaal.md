# Panduan Pembuatan Daemon Process
Pada tulisan ini, saya akan memaparkan langkah-langkah pembuatan proses daemon.

## Buat file .service
Masuk sebagai superuser, lalu jalankan perintah:
```bash
$ sudo touch /etc/systemd/system/irun.service
```

## Penulisan script konfigurasi .service
Buka file yang baru saja dibuat dan tuliskan konfigurasi berikut:

```bash
[Unit]
Description=Daemon Python Service
After=network.target

[Service]
User=andibrahim
WorkingDirectory=/home/andibrahim
Environment="PYTHONPATH=/home/andibrahim"  
ExecStart=/home/andibrahim/myenv/bin/uvicorn main:app --reload --port 7080
Restart=always

[Install]
WantedBy=multi-user.target
```

## Jalankan Perintah Daemon
$ sudo systemctl daemon-reload
$ sudo systemctl start irun.service
$ sudo systemctl status irun.service

## Bukti daemon telah berjalan
![Bukti daemon](https://drive.google.com/uc?export=download&id=11WYM1xRO5lwYOT8RTnrslXm-AqG5pznm)

Tampilan web:
![Bukti tampilan web](https://drive.google.com/uc?export=download&id=18mZfvyfmrL1CPhGLaqW3uBy1dwtUqyez)