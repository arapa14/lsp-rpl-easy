E-Ticketing Easy ✈️
E-Ticketing Easy adalah aplikasi berbasis web sederhana untuk manajemen pemesanan tiket pesawat. Proyek ini dirancang untuk memenuhi kebutuhan standar kompetensi LSP RPL, mencakup fitur autentikasi, manajemen jadwal oleh admin, serta proses pemesanan oleh pengguna.

🚀 Fitur Utama
Pengguna (User)
Registrasi & Login: Akses akun pribadi.

Dashboard: Melihat daftar jadwal penerbangan yang tersedia (stok > 0).

Booking Detail: Memilih jumlah kursi dan melihat kalkulasi total harga secara otomatis.

Riwayat Pemesanan: Melihat daftar tiket yang telah dipesan sebelumnya.

Administrator
Manajemen Jadwal (CRUD): Menambah, melihat, mengubah, dan menghapus jadwal penerbangan.

Monitoring Transaksi: Melihat semua data pemesanan yang dilakukan oleh seluruh pengguna.

Manajemen Stok: Stok berkurang otomatis saat user melakukan pemesanan.

🛠️ Prasyarat (Prerequisites)
Sebelum memulai, pastikan perangkat Anda sudah terpasang:

PHP >= 8.2

Composer

MySQL / MariaDB

Web Server (Apache/Nginx atau menggunakan Laragon)

💻 Instalasi
Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1. Clone Repositori
Buka terminal/git bash dan jalankan perintah:

Bash
git clone https://github.com/username-anda/e-ticketing-easy.git
cd e-ticketing-easy
2. Instal Dependency
Instal library PHP yang dibutuhkan menggunakan Composer:

Bash
composer install
3. Konfigurasi Database
Salin file .env.example menjadi .env:

Bash
cp .env.example .env
Buka file .env dan sesuaikan konfigurasi database Anda:

Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
4. Generate App Key
Bash
php artisan key:generate
5. Jalankan Migration
Buat tabel-tabel yang dibutuhkan ke dalam database:

Bash
php artisan migrate
6. Jalankan Server
Bash
php artisan serve
Akses aplikasi melalui browser di: http://localhost:8000

📂 Struktur Database
Aplikasi ini menggunakan tiga tabel utama:

Users: Menyimpan data kredensial dan role (admin atau user).

Schedules: Menyimpan detail pesawat, rute, waktu keberangkatan, harga, dan stok.

Bookings: Menyimpan relasi transaksi antara user dan jadwal yang dipilih.

🛠️ Teknologi yang Digunakan
Framework: Laravel 11

Bahasa: PHP 8.3

Database: MySQL

Frontend: Blade Templating (Plain HTML untuk kesederhanaan)

📝 Catatan Tambahan
Pastikan untuk menjalankan php artisan migrate agar relasi antar tabel (Foreign Key) terbentuk dengan benar.

Gunakan akun dengan role admin untuk mengakses fitur pengelolaan jadwal di /admin/schedules.