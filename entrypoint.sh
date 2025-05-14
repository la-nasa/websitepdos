#!/usr/bin/env bash
set -e

# Crée le répertoire database si nécessaire
mkdir -p database

# Initialise la SQLite file si elle n’existe pas
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi

# Met à jour le .env pour utiliser SQLite
php -r "file_exists('.env') || copy('.env.example','.env');"
php artisan key:generate --ansi

# Lance les migrations et seeders
php artisan migrate --force
php artisan db:seed --force

# Démarre le serveur Laravel sur le port fourni par Render
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
