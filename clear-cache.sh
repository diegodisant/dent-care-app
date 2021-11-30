#!/bin/bash

dcli() {
    docker compose -f docker-compose.cli.yml run --rm "$@"
}

artisan() {
    docker compose run --rm artisan "$@"
}

# deps
dcli composer install
dcli yarn install
dcli composer clear-cache
dcli yarn cache clean
dcli yarn dev

# laravel caches
artisan cache:clear
artisan view:clear
artisan route:clear
artisan clear-compiled
artisan config:clear
