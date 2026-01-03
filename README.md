<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine
.

Powerful dependency injection container
.

Multiple back-ends for session
 and cache
 storage.

Expressive, intuitive database ORM
.

Database agnostic schema migrations
.

Robust background job processing
.

Real-time event broadcasting
.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Quick Start

Follow these steps after cloning the repository to get the project up and running:

1. Install PHP dependencies
composer install

2. Set up the environment

Copy the example .env file and configure your database credentials:

cp .env.example .env


Edit .env and set your MySQL credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

3. Generate application key
php artisan key:generate

4. Run migrations and seeders

This will create the database tables and seed 5000 users:

php artisan migrate --seed


Make sure the database exists before running migrations.

5. Install frontend dependencies
npm install
npm run dev

6. Start the development server
php artisan serve


Your application should now be running at http://localhost:8000
, complete with authentication and full CRUD for users.