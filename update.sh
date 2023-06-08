# Update the application
# Usage: ./update.sh

# Stop the application
php artisan down

# Download the latest version
#git fetch --all
#git reset --hard origin/master

# Update the dependencies
php composer.phar install --optimize-autoloader --no-dev
npm install

# Build the assets
npm run build

# Clear the cache and refresh the application
php artisan app:refresh

# Restart the application
php artisan up

# Display the version
php artisan app:version

# Wait for the user to close the window
echo "Click enter to close..."
read
