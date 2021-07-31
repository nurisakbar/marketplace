## Markeplace API With Lumen
[![Build Status](https://www.travis-ci.com/nurisakbar/marketplace.svg?branch=main)](https://www.travis-ci.com/nurisakbar/marketplace)<br>
adalah codebase REST-API dari tugas peserta yang mengikuti training membangun REST API dengan lumen selama 2 minggu.
studi kasus nya adalah REST API website marketplace untuk agrobisniss.

## Cara Install & Setup Codebase
untuk melakukan instalasi project ini, silahkan ikuti langkah langkah berikut :
1. git clone https://github.com/nurisakbar/marketplace.git
2. cd marketplace
3. composer install
4. cp .env.example .env
5. sesuaikan konfigurasi database
6. php artisan key:generate
7. php artisan jwt:secret
8. php artisan migrate --seed
9. php artisan serve

## Migration & Seeder
untuk menajalankan migrate sekaligus dengan data dummy, silahkan jalankan perintah:<br>
php artisan migrate --seed

## System Requiretmen


    PHP >= 7.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension



## Referensi
https://github.com/surahmans/Lumen-Design-Pattern<br>
https://github.com/andersao/l5-repository
