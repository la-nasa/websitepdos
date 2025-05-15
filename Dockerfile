# === Stage 1: front build ===
FROM node:18 AS front-builder
WORKDIR /app

# Copier package.json, vite.config.js, etc.
COPY package*.json vite.config.js ./

RUN npm install

# Copier sources front et compiler
COPY resources resources
RUN npm run build

# === Stage 2: Laravel ===
FROM php:8.1-fpm

# Dépendances système + extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libpq-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd mbstring

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier tout le code Laravel
COPY . .

# Copier les assets compilés
COPY --from=front-builder /app/public/build public/build

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Entrypoint & port
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 8000
