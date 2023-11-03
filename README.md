# gsas-server
### To incorporate composer into the program (DO NOT use sudo):
composer install
./vendor/bin/sail up

### To generate .env file:
cp .env.example .env
php artisan key:generate

### To migrate PostgreSQL database:
php artisan migrate