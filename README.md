<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

# Requirements

- Docker and Docker Compose
- PHP 8.1+
- Composer

# Installation

1. Clone the repository
2. Run `composer install`. You might need to pass `--ignore-platform-reqs` if you're not using PHP 8.1
3. Run `cp .env.example .env`
4. Run `./vendor/bin/sail up -d`
5. Run `./vendor/bin/sail artisan key:generate`
6. Run `./vendor/bin/sail artisan migrate`
7. Run `./vendor/bin/sail artisan db:seed`

# Deployment to fly.io

- Install flyctl
- Authenticate with flyctl
- Open the `fly/applications/mysql` directory and run `flyctl launch`
    3.1 If you want, change the name of the app
    3.2 Once the app is created in fly.io, add the following two secrets:
  - `MYSQL_PASSWORD`
  - `MYSQL_ROOT_PASSWORD`
    - You can do it from here: <https://fly.io/sites/your-app-name/secrets>, e.g. <https://fly.io/apps/laracasts-blog-mysql/secrets>
- Run `flyctl deploy`

- Inside of the root directory, run `flyctl launch`
  - If you want, change the name of the app
  - Once the app is created in fly.io, add the following two secrets:
    - `DB_PASSWORD` (the same as `MYSQL_PASSWORD`)
      - You can do it from here: <https://fly.io/sites/your-app-name/secrets>, e.g. <https://fly.io/apps/laracasts-blog/secrets>
- Run `flyctl deploy`
- Visit the app URL: <https://laracasts-blog.fly.dev>
