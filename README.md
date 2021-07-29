## Markeplace API With Lumen
[![Build Status](https://www.travis-ci.com/nurisakbar/marketplace.svg?branch=main)](https://www.travis-ci.com/nurisakbar/marketplace)

## Cara Install & Setup Codebase
untuk melakukan instalasi project ini, silahkan ikuti langkah langkah berikut :
1. git clone https://github.com/nurisakbar/marketplace.git
2. cd marketplace
3. composer install
4. cp .env.example .env
5. sesuaikan konfigurasi database
6. php artisan key:generate
7. php artisan jwt:secret
8. php artisan serve

## Migration & Seeder
untuk menajalankan migrate sekaligus dengan data dummy, silahkan jalankan perintah:<br>
php artisan migrate --seed

## Referensi
https://github.com/surahmans/Lumen-Design-Pattern<br>
https://github.com/andersao/l5-repository
