Sistem Pencatatan Barang sederhana menggunakan Framework Laravel 10.


CRUD menggunakan modal untuk pengambilan data agar mengurangi penggunaan pindah halaman.


Prasyarat
Berikut beberapa hal yang perlu diinstal terlebih dahulu:

Composer (https://getcomposer.org/)

PHP ^8.2

MySQL

XAMPP

Jika Anda menggunakan XAMPP, untuk PHP dan MySQL sudah menjadi 1 (bundle) di dalam aplikasi XAMPP

Fitur

CRUD Data Barang
CRUD Data Ruangan
CRUD Data Klasifikasi

Langkah-langkah instalasi
Clone repository ini
$ git clone https://github.com/dianfeb/sistempencatatanbarang.git
Install seluruh packages yang dibutuhkan
$ composer install
Siapkan database dan atur file .env sesuai dengan konfigurasi Anda

Contoh:
Jika sudah, migrate seluruh migrasi dan seeding data
$ php artisan migrate --seed
Jalankan local server
$ php artisan serve
User default aplikasi untuk login

Email       : admin@mail.com
Password    : secret



