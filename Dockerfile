# === Étape 1 : build front ===
FROM node:18 AS front-builder

WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm install
COPY resources/css resources/css
COPY resources/js resources/js
RUN npm run build

# === Étape 2 : conteneur Laravel ===
FROM php:8.1-fpm

# 1) Installe dépendances système et PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
  && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# 2) Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3) Copier code Laravel
WORKDIR /var/www/html
COPY . .

# 4) Copier les assets front buildés
COPY --from=front-builder /app/public/build public/build

# 5) Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# 6) Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# 7) Copier et définir l’entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["/entrypoint.sh"]
