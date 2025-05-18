# -------------------------------
# Stage 1: Build des assets front
# -------------------------------
FROM node:18 AS front-builder

WORKDIR /app

# Copier package.json + vite.config.js + tsconfig/postcss si besoin
COPY package*.json vite.config.js ./

# Installer les dépendances front
RUN npm ci

# Copier les sources front et compiler
COPY resources resources
RUN npm run build

# -------------------------------
# Stage 2: Build de l'app Laravel
# -------------------------------
FROM php:8.1-fpm

# 1) Dépendances système + extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libpq-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd mbstring

# 2) Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 3) Copier tout le code Laravel
COPY . .

# 4) Copier les assets front-builder
COPY --from=front-builder /app/public/build public/build

# 5) Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# 6) Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# 7) Entrypoint pour SQLite / migrations / démarrage
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000
ENTRYPOINT ["/entrypoint.sh"]
