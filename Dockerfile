# Étape 1 : build des assets front avec Node.js
FROM node:18 AS front-builder

WORKDIR /app

# Copie des fichiers de dépendances front
COPY package*.json ./
COPY vite.config.js ./
# et tout autre fichier JS/TS nécessaire à npm install
RUN npm install

# Copie du code front et compilation
COPY resources/js resources/js
COPY resources/css resources/css
# si vous avez d'autres dossiers (ex: assets)
RUN npm run build

# Étape 2 : conteneur PHP pour Laravel
FROM php:8.1-fpm

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier tout le code Laravel
COPY . .

# Copier les assets compilés depuis front-builder
COPY --from=front-builder /app/public/build public/build

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Donner les droits d’écriture sur storage et cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exposer le port
EXPOSE 8000

# Commande de démarrage
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
