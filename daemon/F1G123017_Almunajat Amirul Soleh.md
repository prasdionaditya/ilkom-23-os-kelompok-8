---

# File Manager dengan Daemon Process untuk Monitoring Perubahan File

Proyek ini adalah **File Manager** berbasis web yang digunakan untuk memantau perubahan dalam sebuah direktori dan mencatat setiap perubahan ke dalam log. Untuk menjaga daemon process tetap berjalan di latar belakang bahkan setelah terminal ditutup, kita menggunakan **NSSM** (Non-Sucking Service Manager) sebagai layanan yang akan menjalankan daemon process secara otomatis di Windows.

## Fitur Utama
1. **Monitoring Direktori**: Program ini memantau direktori tertentu untuk perubahan seperti penambahan dan penghapusan file.
2. **Pencatatan Log Otomatis**: Setiap perubahan dicatat secara otomatis ke dalam file log.
3. **Daemon Process**: Menggunakan NSSM untuk menjalankan daemon process di latar belakang, sehingga daemon akan terus berjalan meskipun terminal ditutup.
4. **Tampilan Log di Web**: Log perubahan file dapat dilihat secara langsung melalui antarmuka web yang sederhana dan intuitif.

## Instalasi dan Konfigurasi

### 1. Persyaratan
- **PHP**: Versi yang digunakan adalah PHP 8.1 (bisa disesuaikan tergantung kebutuhan).
- **Laragon**: Digunakan sebagai local development environment. Anda bisa menggantinya dengan XAMPP atau WAMP jika diinginkan.
- **NSSM**: Alat untuk mengelola daemon process di Windows.

### 2. Struktur Proyek
```
C:\laragon\www\file-manager
├── daemon.php
├── index.php
├── log.txt
├── config.php
└── watch (folder untuk dipantau)
```

### 3. Konfigurasi File
#### 3.1. File Konfigurasi (`config.php`)
```php
<?php
define('WATCH_DIR', __DIR__ . '/watch'); // Direktori yang akan dipantau
define('LOG_FILE', __DIR__ . '/log.txt'); // File log
?>
```

#### 3.2. Daemon Process (`daemon.php`)
File ini akan memantau perubahan di dalam direktori yang didefinisikan dan mencatat setiap perubahan ke dalam log.
```php
<?php
require 'config.php';

class FileWatcher {
    private $lastState = [];

    public function __construct() {
        if (!file_exists(LOG_FILE)) {
            file_put_contents(LOG_FILE, "Log file created.\n");
        }
        $this->lastState = $this->scanDirectory(WATCH_DIR);
    }

    public function scanDirectory($dir) {
        return array_diff(scandir($dir), ['.', '..']);
    }

    public function logChange($message) {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents(LOG_FILE, "[$timestamp] $message\n", FILE_APPEND);
    }

    public function start() {
        while (true) {
            $currentState = $this->scanDirectory(WATCH_DIR);
            $addedFiles = array_diff($currentState, $this->lastState);
            $removedFiles = array_diff($this->lastState, $currentState);

            foreach ($addedFiles as $file) {
                $this->logChange("File added: $file");
            }

            foreach ($removedFiles as $file) {
                $this->logChange("File removed: $file");
            }

            $this->lastState = $currentState;
            sleep(5); // Cek setiap 5 detik
        }
    }
}

$fileWatcher = new FileWatcher();
$fileWatcher->start();
?>
```

#### 3.3. Tampilan Website (`index.php`)
Antarmuka web ini menampilkan isi log yang dihasilkan oleh daemon process.
```php
<?php
require 'config.php';

if (!file_exists(WATCH_DIR)) {
    mkdir(WATCH_DIR);
}

function readLog() {
    return file_exists(LOG_FILE) ? file_get_contents(LOG_FILE) : '';
}

$logContent = readLog();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logs {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            font-family: monospace;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>File Manager</h1>
        <h2>Log Perubahan File</h2>
        <div class="logs">
            <?php echo htmlspecialchars($logContent); ?>
        </div>
    </div>
</body>
</html>
```

## Menjalankan Daemon Process dengan NSSM
### 1. Instalasi NSSM
1. **Download NSSM** dari situs resmi [NSSM](https://nssm.cc/download).
2. Ekstrak dan simpan di direktori yang mudah diakses, misalnya: `C:\nssm-2.24\win64`.

### 2. Menginstal Daemon Process sebagai Layanan
1. **Buka Command Prompt** sebagai Administrator.
2. Jalankan perintah berikut untuk menginstal daemon sebagai service:
   ```bash
   C:\nssm-2.24\win64\nssm.exe install FileWatcher
   ```
3. Isi form konfigurasi yang muncul:
   - **Path**: `C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe` (sesuaikan dengan path PHP Anda).
   - **Startup Directory**: `C:\laragon\www\file-manager`.
   - **Arguments**: `daemon.php`.

4. **Menjalankan Service**:
   Setelah terinstal, jalankan service dengan:
   ```bash
   C:\nssm-2.24\win64\nssm.exe start FileWatcher
   ```

### 3. Menghentikan Service
Untuk menghentikan daemon process, jalankan:
```bash
C:\nssm-2.24\win64\nssm.exe stop FileWatcher
```

## Cara Kerja Daemon
Daemon akan terus berjalan di latar belakang dan memantau perubahan pada direktori `watch/`. Setiap file yang ditambahkan atau dihapus dari direktori tersebut akan dicatat di `log.txt`, dan hasilnya dapat dilihat melalui antarmuka web yang telah dibuat.

## Penutup
Dengan konfigurasi ini, daemon process akan berjalan otomatis tanpa perlu bergantung pada terminal atau aplikasi PHP yang dijalankan secara manual. NSSM akan memastikan daemon selalu berjalan di latar belakang, dan jika terjadi crash, daemon dapat di-restart dengan mudah. Integrasi ini cocok untuk proyek yang membutuhkan monitoring real-time, seperti pada aplikasi file manager ini.

## Screenshots

- **Tampilan web**:
 ![Tampilan log di web](https://drive.google.com/uc?export=view&id=1zF7lM3z-iJVy-Crxwe6JWo5CVfDlqeCE)
 
- **Tampilan Log**:
![Tampilan Gambar](https://drive.google.com/uc?export=view&id=1OYpjbzay6aOPn6pXg5zTHiGzJqw_Gx2n
)
  ![Daemon Process](https://drive.google.com/uc?export=view&id=11YSPxvFqxUOtIj5zoqdyApwDTBrLkttC
)

- **Daemon Process Berjalan**:
 ![Tampilan log](https://drive.google.com/uc?export=view&id=1bhXqBczK3KqDDmoMmyPADN7M50fZ49J8
)


---
