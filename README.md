## Install

1. Clone this repo `git clone https://github.com/osom-alexandr/ym.git`
2. Install dependencies `composer install`
3. Create .env file `cp .env.example .env`
4. Run docker containers `./vendor/bin/sail up`
5. Enter in app container and run `php artisan key:generate` or `docker exec ym-laravel.test-1 php artisan key:generate`
6. Enter in app container and run `php artisan migrate:fresh --seed` or `docker exec ym-laravel.test-1 php artisan migrate:fresh --seed`
7. Get Postman collection from root folder and test)
8. You can use pgadmin (http://localhost:8080/), see credentials in docker compose
