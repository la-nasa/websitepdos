# === Étape front-builder (Node) ===
FROM node:18 AS front-builder
WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm install
COPY resources resources
COPY public public
RUN npm run build

# === Étape PHP (Laravel) ===
FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libpq-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
COPY --from=front-builder /app/public/build public/build

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 8000
