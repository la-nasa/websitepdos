# Étape 1 : build front
FROM node:18 AS front-builder

WORKDIR /app

# Copier package.json + vite.config.js
COPY package*.json vite.config.js ./

RUN npm install

# Copier le code front
COPY resources/css resources/css
COPY resources/js resources/js
COPY public public

RUN npm run build

# Étape 2 : build PHP
FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
  && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier le code Laravel
COPY . .

# Copier les assets compilés
COPY --from=front-builder /app/public/build public/build

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

CMD ["php","artisan","serve","--host=0.0.0.0","--port=8000"]

# Étape front-builder
RUN npm install && npm run build

# Étape PHP
COPY --from=front-builder /app/public/build public/build


