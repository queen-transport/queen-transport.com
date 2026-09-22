# 👑 Queen Transport (queen-transport.com)

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-v5.x-FFAA00?style=flat-square&logo=filament&logoColor=white)](https://filamentphp.com)
[![Livewire](https://img.shields.io/badge/Livewire-v4.x-FB70A9?style=flat-square&logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4.x-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Pest](https://img.shields.io/badge/Tested_with-Pest_v5-0ea5e9?style=flat-square)](https://pestphp.com)

**Queen Transport** adalah platform web resmi untuk layanan sewa mobil mewah, transportasi VIP, dan perjalanan eksekutif di Surabaya & Jawa Timur. Aplikasi ini mencakup *public-facing web* berdesain modern dengan tema *dark luxury*, katalog armada premium lengkap dengan fasilitas dan integrasi pemesanan WhatsApp instan, blog SEO-friendly, serta panel administrasi berbasis **Filament v5** untuk manajemen konten yang fleksibel.

---

## 🌟 Fitur Utama

### 1. Website Publik (Front-End)
- **Desain Dark Luxury**: Tampilan antarmuka berkelas dengan animasi halus dan responsif di berbagai perangkat.
- **Hero Interaktif**: Dilengkapi video showcase armada dengan kontrol suara (*audio toggle*).
- **Katalog & Detail Armada**:
  - Tampilan armada premium (All New Alphard HEV, Hiace Premio Luxury, Fortuner Legend, Innova Zenix, dsb.).
  - Rincian spesifikasi kapasitas kursi, fasilitas VIP (Executive Lounge, Smart TV, Driver Standar Protokol, dll.), dan tarif sewa transparan.
  - Tombol CTA langsung terhubung ke WhatsApp dengan pesan kustom otomatis.
- **Galeri & Pelanggan**: Showcase dokumentasi layanan dan portofolio pelanggan korporat maupun VIP.
- **Portal Artikel & Blog**:
  - Struktur permalink SEO-friendly berbasis tanggal (`/{year}/{month}/{slug}`).
  - Halaman arsip artikel, pencarian, dan kategorisasi berbasis tag & kategori.
- **XML Sitemap Dinamis**: Tersedia rute `/sitemap.xml` otomatis untuk optimasi indexing mesin pencari (SEO).

### 2. Panel Admin (Filament CMS - `/admin`)
- **Manajemen Armada**: Tambah, ubah, urutkan (*sorting*), upload media/foto, dan kontrol visibilitas armada.
- **Manajemen Blog & Konten**: Pengelolaan postingan artikel, kategori, dan tag dengan rich text editor.
- **WordPress Post Importer**: Fitur khusus untuk mengimpor artikel dari instalasi WordPress lama secara mudah.
- **Manajemen Galeri & Testimoni**: Kelola galeri foto dan ulasan/data pelanggan.
- **Pengaturan Situs (Site Settings)**: Kelola nama brand, nomor WhatsApp reservasi, tautan media sosial, alamat, hingga video hero secara langsung tanpa menyentuh kode.
- **Dashboard & Analitik**: Widget statistik overview bisnis, tren postingan per bulan (*chart*), dan artikel terbaru.
- **Keamanan Akun**: Dukungan otentikasi Fortify, Two-Factor Authentication (2FA), dan WebAuthn/Passkeys.

---

## 🛠️ Tech Stack

- **Backend Framework**: [Laravel 12+](https://laravel.com)
- **Admin Panel & CMS**: [Filament PHP v5](https://filamentphp.com)
- **Frontend Reactive Engine**: [Livewire v4](https://livewire.laravel.com) & [Livewire Flux](https://flux.livewire.com)
- **Styling**: [Tailwind CSS v4](https://tailwindcss.com) + [Vite](https://vitejs.dev)
- **Media Handler**: [Spatie MediaLibrary v11](https://spatie.be/docs/laravel-medialibrary)
- **Database Backup**: [Spatie Laravel Backup](https://spatie.be/docs/laravel-backup)
- **Testing**: [Pest PHP v5](https://pestphp.com)
- **Static Analysis & Linting**: [Larastan v3](https://github.com/larastan/larastan) & [Laravel Pint](https://laravel.com/docs/pint)

---

## 📋 Prasyarat Sistem

Pastikan sistem lokal Anda telah terpasang dependensi berikut:
- **PHP** >= 8.3 (dengan ekstensi: `pdo`, `sqlite3`/`mysql`, `mbstring`, `openssl`, `gd` atau `imagick`, `curl`, `intl`)
- **Composer** >= 2.x
- **Node.js** >= 20.x & **npm**
- **Database**: SQLite (default lokal) atau MySQL/MariaDB

---

## 🚀 Instalasi & Menjalankan Aplikasi

### Metode 1: Setup Otomatis (Direkomendasikan)

Proyek ini telah dilengkapi script setup bawaan di Composer:

```bash
# 1. Clone repository
git clone https://github.com/username/queen-transport.com.git
cd queen-transport.com

# 2. Jalankan automasi setup
composer run setup
```
*Script di atas akan menjalankan: `composer install`, copy `.env`, generate app key, migrasi database, `npm install`, dan `npm run build`.*

### Metode 2: Setup Manual Langkah demi Langkah

Jika ingin melakukan konfigurasi secara bertahap:

```bash
# 1. Clone repository
git clone https://github.com/username/queen-transport.com.git
cd queen-transport.com

# 2. Install dependensi PHP
composer install

# 3. Siapkan file Environment
cp .env.example .env
php artisan key:generate

# 4. Siapkan Database & Jalankan Migrasi + Seeder
# Jika menggunakan SQLite:
touch database/database.sqlite

# Migrasi dan isi data awal (admin, armada, artikel, dll.):
php artisan migrate --seed

# 5. Link Storage publik untuk media gambar
php artisan storage:link

# 6. Install dependensi Node.js & Compile Aset
npm install
npm run build
```

---

## 🔑 Akun Default Admin

Setelah proses seeder (`php artisan db:seed`) selesai, Anda dapat masuk ke panel admin:

- **URL Admin Panel**: [`http://localhost:8000/admin`](http://localhost:8000/admin)
- **Email**: `admin@queen-transport.com`
- **Password**: `password`

> **Catatan Keamanan**: Segera ubah kata sandi dan aktifkan Two-Factor Authentication (2FA) di lingkungan produksi.

---

## 💻 Menjalankan Server Pengembangan (Local Dev)

Jalankan seluruh server (backend, queue/worker, dan Vite) sekaligus dengan satu perintah:

```bash
composer run dev
```

Atau secara terpisah di terminal yang berbeda:

```bash
# Terminal 1: Backend PHP
php artisan serve

# Terminal 2: Vite Hot Reload
npm run dev
```

Buka peramban (browser) di [`http://localhost:8000`](http://localhost:8000).

---

## 🧪 Testing & Kualitas Kode

Proyek ini menggunakan suite testing lengkap berbasis **Pest PHP**:

```bash
# Menjalankan seluruh test
composer test

# Menjalankan test Pest secara langsung
php artisan test

# Menjalankan test tertentu
php artisan test --filter=ArmadaTest

# Cek static analysis (Larastan / PHPStan)
composer types:check

# Format kode otomatis (Laravel Pint)
composer lint

# Cek format kode tanpa mengubah file
composer lint:check
```

---

## 📁 Struktur Direktori Penting

```text
queen-transport.com/
├── app/
│   ├── Filament/               # Panel admin Filament v5
│   │   ├── Pages/              # Halaman custom (ImportPosts, ManageSettings)
│   │   ├── Resources/          # CRUD resources (Armadas, Posts, Galeris, dll.)
│   │   └── Widgets/            # Dashboard widgets & charts
│   ├── Http/
│   │   └── Controllers/        # ArmadaController, BlogController, BaseController
│   ├── Models/                 # Eloquent Models (Armada, Post, Galeri, dll.)
│   └── Providers/              # AdminPanelProvider, Fortify, Folio, dll.
├── config/
│   ├── site.php                # Konfigurasi profil Queen Transport
│   └── ...
├── database/
│   ├── factories/              # Factory data uji
│   ├── migrations/             # Struktur tabel database
│   └── seeders/                # Data awal (ArmadaSeeder, DatabaseSeeder, dll.)
├── resources/
│   ├── views/
│   │   ├── armada/             # Tampilan index & detail armada
│   │   ├── blog/               # Tampilan blog & artikel
│   │   ├── home.blade.php      # Landing page utama
│   │   └── layouts/            # Master layout Blade & Public layout
│   └── css/ & js/              # Sumber daya stylesheet & script frontend
├── routes/
│   ├── web.php                 # Rute utama aplikasi publik
│   └── settings.php            # Rute pengaturan pengguna
└── tests/                      # Feature & Unit tests (Pest PHP)
```

---

## ⚙️ Variabel Lingkungan Khusus (.env)

Selain konfigurasi standar Laravel, Anda dapat mengatur parameter profil bisnis melalui `.env`:

```env
# Konfigurasi Situs & Kontak Queen Transport
SITE_BRAND="Queen Transport"
SITE_TAGLINE="Solusi Sewa Mobil Mewah"
SITE_WHATSAPP_NUMBER="6282333343634"
SITE_INSTAGRAM_URL="https://www.instagram.com/wahyusasetya/"
SITE_ADDRESS="Jl. Masjid RT 02 RW 02 Desa Ganting, Kec. Gedangan, Sidoarjo"
```

---

## 📦 Pencadangan (Backup)

Pencadangan database dan berkas media dapat dijalankan melalui perintah Spatie Backup:

```bash
# Backup database dan file
php artisan backup:run

# Backup database saja
php artisan backup:run --only-db

# Cek status backup
php artisan backup:list
```

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
Hak Cipta &copy; 2026 **Queen Transport**. Seluruh hak cipta dilindungi undang-undang.
