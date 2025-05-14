# Étape 1 : build front
FROM node:18 AS front-builder

WORKDIR /app

# Copier tous les fichiers nécessaires pour Vite
COPY package*.json vite.config.js ./
COPY postcss.config.js tailwind.config.js* ./

# Copier les sources front
COPY resources resources
COPY public public

RUN npm install
RUN npm run build

# Étape 2 : build PHP
FROM php:8.1-fpm

# Installer dépendances système et PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
  && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier l'ensemble du projet
COPY . .

# Copier les assets front buildés
COPY --from=front-builder /app/public/build public/build

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

# Entrypoint pour migrations + démarrage
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
