Berikut adalah panduan untuk membuat service daemon `aas.service` :

# Panduan Pembuatan Daemon Process untuk almunajat.service

Pada panduan ini, saya akan menjelaskan langkah-langkah untuk membuat proses daemon dengan `systemd` untuk aplikasi FastAPI.

## Buat File .service
Masuk sebagai superuser, lalu jalankan perintah berikut untuk membuat file service:

```bash
$ sudo touch /etc/systemd/system/aas.service
```

