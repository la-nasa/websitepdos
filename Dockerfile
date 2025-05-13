# Dockerfile
FROM php:8.1-fpm

# Installe les extensions PHP requises
RUN apt-get update \
  && apt-get install -y git unzip libzip-dev libpng-dev libonig-dev \
  && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crée et positionne dans le dossier de l’app
WORKDIR /var/www/html
COPY . .

# Installe les dépendances
RUN composer install --no-dev --optimize-autoloader \
  && npm install \
  && npm run build

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose le port
EXPOSE 8000

# Commande de démarrage
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
