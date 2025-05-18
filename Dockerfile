# ----------------------------
# Stage 1 : Build des assets
# ----------------------------
FROM node:18 AS front-builder

# Répertoire de travail pour le build front
WORKDIR /app

# Copie des fichiers de config Vite et des dépendances
COPY package*.json vite.config.js ./

# Installation des packages front
RUN npm ci

# Copie des sources front (CSS & JS)
COPY resources/js resources/js
COPY resources/css resources/css

# Build Vite pour prod (génère public/build/manifest.json & assets)
RUN npm run build

# ----------------------------
# Stage 2 : Build Laravel PHP
# ----------------------------
FROM php:8.1-fpm

# Installer dépendances système + extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libpq-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd mbstring

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier tout le code Laravel
COPY . .

# Copier les assets front-builder dans public/build
COPY --from=front-builder /app/public/build public/build

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Entry point pour SQLite et migrations
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000
ENTRYPOINT ["/entrypoint.sh"]
