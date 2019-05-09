# Lottery - Laravel

## Installation

El código se desarrolló para Homestead, con Vagrant 2.2.4 y VirtualBox 5.2


Clone the repository

    git clone https://github.com/phobia82/Lottery-Laravel.git

Switch to the repo folder

    cd Lottery-Laravel
	
Configure your .env file

Install dependencies

    composer install

Generate a new application key

    php artisan key:generate
	
Run the database migrations

    php artisan migrate

Run the database seeders

    php artisan db:seed

Install the javascript dependencies using npm

    npm install --no-bin-links

Compile the dependencies

    npm run development
	
Start the local development server

    php artisan serve

Edit `config/webapi.php` config settings to match WebApi url

Acceder al sitio en http://localhost:8000

**Command list**

    git clone https://github.com/phobia82/Lottery-Laravel.git
    cd Lottery-Laravel
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install --no-bin-links
    npm run development
    php artisan migrate
    php artisan db:seed
    php artisan serve

## Logging In

`php artisan db:seed` adds 1 admin and 50 sample users for testing. The credentials are as follows:

* Administrator: `admin@admin.com`

Password: `password`

## License

[MIT LICENSE](https://github.com/viralsolani/laravel-adminpanel/blob/master/LICENSE.txt)