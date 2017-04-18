# Little Orazem's Activity
<img src="https://raw.githubusercontent.com/sikhub/little-orazems-activity/master/public/images/orazem.png" data-canonical-src="https://raw.githubusercontent.com/sikhub/little-orazems-activity/master/public/images/orazem.png" width="150" style="margin:0 auto;"/>

## Server specifications

Developed on Vagrant Homestead box (2.0.0)

- PHP 7.1.2
- MySQL 5.7.17
- nginx 1.11.9

## Installation

1. Clone repo

`git clone git@github.com:sikhub/little-orazems-activity.git`

2. Run composer update

`composer update`

3. Change `.env` configuration

- database
- APP_URL

4. Run migrations to set up database

- Clean database

`php artisan migrate`

- With dummy generated data

`php artisan migrate:refresh --seed`
