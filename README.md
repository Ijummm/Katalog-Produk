# <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Objects/Camera%20with%20Flash.png" alt="Camera" width="40" /> Galeri Foto Produk - UKK 2026

<p align="left">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" />
</p>

> **Platform Manajemen Katalog Digital** yang dirancang dengan prinsip *Minimalist UI* untuk performa maksimal. Dikembangkan khusus untuk Uji Kompetensi Keahlian (UKK) SMKN 11 Malang.

---

## 🚀 Fitur Unggulan
Aplikasi ini menerapkan sistem **Role-Based Access Control (RBAC)** dengan fitur:
- [x] **Multi-Role Auth**: Login berbeda untuk Admin & User.
- [x] **CRUD Expert**: Manajemen foto produk lengkap dengan hapus otomatis file di storage.
- [x] **Interaction**: Sistem komentar antar pengguna pada setiap produk.

---

## 🏛️ Arsitektur & Database

### Struktur Relasi (ERD)
Sistem ini menggunakan relasi database yang dinormalisasi untuk menjaga integritas data.

<p align="center">
  <img width="660" height="672" alt="Image" src="https://github.com/user-attachments/assets/9f14a655-dd40-43f7-a5f1-a09eeb0262ef" />
</p>



### 📊 Data Dictionary
| Tabel | Primary Key | Foreign Key | Fungsi |
| :--- | :--- | :--- | :--- |
| `users` | `userID` | - | Autentikasi & Role |
| `foto` | `fotoID` | `userID` | Katalog Produk |
| `komentarfoto` | `komentarID` | `fotoID`, `userID` | Interaksi User |

---

## 🖼️ Dokumentasi Visual (Output)

### 🔐 Autentikasi
Antarmuka Login dan Register yang bersih dan simpel.
<p align="center">
  <img width="917" height="732" alt="Image" src="https://github.com/user-attachments/assets/a51ac271-6583-49e8-8867-73f6b27a7a29" />
</p>

### 📱 Dashboard (User & Admin)
Halaman user sama dengan halaman admin namun tidak bisa crud.
<p align="center">
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/e858bcb0-f538-4ef8-901b-53a485924100" />
</p>

### 📱 Dashboard (User & Admin)
Detail produk sekaligus dengan nemanbah komentar.
<p align="center">
 <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/f00d0879-a775-4369-b61e-00f1ead75ee1" />
</p>

### 🛠️ Panel Manajemen & Form (Admin Only)
Kontrol penuh bagi administrator untuk mengelola konten galeri.
<p align="center">
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/289a5f6d-1ced-4eb1-9f8a-390f42448c0f" />
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/b9531ca4-7aff-4380-bb6a-89303d7773f5" />
</p>

---

## ⚙️ Instalasi Cepat
Cukup 4 langkah untuk menjalankan aplikasi di komputer lokal:

```bash
# Clone Repository
git clone https://github.com/username/katalog-produk.git

# Masuk ke folder project
cd katalog-produk

# Install dependency
composer install

# Copy file environment
cp .env.example .env

# Generate key
php artisan key:generate

# Migrasi database
php artisan migrate

# Jalankan aplikasi
php artisan serve
