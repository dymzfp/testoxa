# Badge and Level using Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

## Requirements
* PHP => 7.1x
* Postman => [Download](https://www.getpostman.com/downloads/)
* MYSQL / PostgreSQL Database

## Setup Project

* Clone this Repo
```bash
git clone https://github.com/dymzfp/testoxa
```
* generate .env files
```bash
cp .env.example .env
```
* edit necessary configuration 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= your database
DB_USERNAME= your database username
DB_PASSWORD= your database password
```

* setting your app key and your jwt screet
```
APP_KEY=your_app_key
JWT_SECRET=your_jwt_screet
```

* run migration

```bash
php artisan migrate:fresh --seed
```

* start the server

```bash
php -S localhost:8000 -t public
```

## Postman Colection


## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
