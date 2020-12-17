# <img src="./public/images/logo.png" width="24" height="26" /> Copybu

```
git clone --recursive git@github.com:d3ple/copybu.git
cd ./copybu/laradock
cp env-example .env
docker-compose up -d nginx mysql phpmyadmin
docker-compose exec --user=laradock workspace bash

cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```