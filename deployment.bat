:: php artisan down --render="errors::maintenance" --secret="dep"
:: git pull
:: composer install --optimize-autoloader --no-dev
php artisan migrate
php artisan key:generate
php artisan optimize:clear
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache
php artisan event:generate
:: php artisan up