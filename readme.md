# CES-WMS Interview Project

## Purpose
This is a Laravel project that:
- Renders a Single Page App to display a list of genres.
- The user is presented with a form to select a movie genre.
  - Once the user submits the form with a movie genre, a random movie recommendation is displayed.
  - The user can additionally request the review score from TMDB.


## Caveats
PHP 7.1 is [officially EOL](https://www.php.net/supported-versions.php) and stopped receiving updates. Many dependencies of Laravel 5.8 require
PHP 7.2 or higher. **This project targets PHP 7.4 as it is the [oldest, officially supported build](https://www.php.net/supported-versions.php).**

If you want to run this project on your local machine but don't have PHP 7.4, I advise you to upgrade or use the Docker demo instructions.


## System Requirements
- PHP 7.4 or higher with the following extensions:
  - JSON
  - PDO
  - PDO Sqlite driver (or other database driver)
  - Mbstring
  - OpenSSL
  - Curl
  - BCMath
  - Tokenizer
- [Composer](https://getcomposer.org/) (package manager for PHP)
- [NodeJS](https://nodejs.org/en/) 12 or higher with NPM (to build js/css assets)


## Running the project locally
Assuming you have `php` and `npm` in your shell's path:
- Clone the project for GitHub
- Copy the `.env.example` file to `.env`
```
# for macOS or Linux
cp .env.example .env

# for Windows
copy .env.example .env
```
- Install the composer dependencies:
```
composer install
```
- Create an empty file for the sqlite database:
```
# for macOS or Linux
touch db.sqlite

# for Windows
echo "" > db.sqlite
```
- Compile and install javascript and CSS assets:
```
# install packages fro package-lock.json
npm ci

# compile assets for production
npm run production
```
- Modify the `.env` file:
  - For sqlite:
    - Change the `DB_DATABASE` value to be the absolute path of the database file created in a previous step.
  - For MariaDB/Postgres/MSSQL:
    - Modify the configuration according to [Laravel's Getting Started documentation](https://laravel.com/docs/5.8/database)
  - Obtain a version 3 [API key for The Movie DB](https://developers.themoviedb.org/3/getting-started/introduction) and specify the API key (not the token) as the `TMDB_API_KEY` value.
- Run the tests:
```
# for macOS or Linux
vendor/bin/phpunit

# for Windows
php vendor\bin\phpunit
```
- Finally, run the local development server:
```
php artisan serve
```
- Open [http://localhost:8000](http://localhost:8000) to view the application.


## Running the project in Docker
I have also included a `Dockerfile` that runs the application in a single container using Apache with PHP 7.4 (PHP 7.1 is no longer supported). To get started:
- Ensure you have [Rancher Desktop](https://rancherdesktop.io/) (you can also use [Docker Desktop](https://www.docker.com/products/docker-desktop) if you fall into a supported non-commercial license) installed for macOS or Windows, or install the [Docker Engine](https://docs.docker.com/engine/install/) on a supported Linux environment.
- Run the following commands to build and start the Docker container:
```
# build the container
docker build . -t ces-wms-demo:latest

# start
docker run --name ces-wms-demo --rm -p 8000:80 ces-wms-demo:latest
```
- Once the container is running, open [http://localhost:8000](http://localhost:8000) to view the application.
