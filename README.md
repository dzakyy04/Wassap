# WASSAP

 Website Portal Berita

## Installation

Clone Repositori

    git clone https://github.com/dzakyy04/wassap.git

Pindah ke folder repo

    cd wassap

Install semua depedencies menggunakan composer

    composer install

Install node package manager

    npm install

Copy contoh file env dan buat perubahan konfigurasi yang diperlukan di file .env

    cp .env.example .env

Jalankan migrasi database (**Atur koneksi database di .env sebelum melakukan migrasi**)

    php artisan migrate

Seed database

    php artisan migrate:fresh --seed

Mulai local development server

    php artisan serve

Sekarang website dapat diakases di http://localhost:8000

## Kredensial
* User
    * Email : user@gmail.com
    * Password : password
* Admin
    * Email : admin@gmail.com
    * Password : password


