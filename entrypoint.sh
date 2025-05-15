#!/usr/bin/env bash
set -e

# --- SQLite setup ---
mkdir -p database
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi

# Copie .env.example si .env absent
php -r "file_exists('.env') || copy('.env.example','.env');"

# Génère APP_KEY si nécessaire
php artisan key:generate --ansi

# Migrations & seeders
php artisan migrate --force
php artisan db:seed --force

# Démarrage
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
