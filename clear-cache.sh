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

# laravel caches
dcli cache:clear
dcli config:clear
dcli route:clear
dcli view:clear
