php artisan down --render="errors::maintenance" --secret="deployment"
git fetch --all
git reset --hard origin/master
php composer.phar update --optimize-autoloader --no-dev
php artisan app:refresh
php artisan up
php artisan app:version
echo "Click enter to close..."
read