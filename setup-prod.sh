#!/bin/bash

dcli() {
    docker compose -f docker-compose.cli.yml run --rm "$@"
}

artisan() {
    docker compose run --rm artisan "$@"
}

dcli composer install --optimize-autoloader --no-dev
dcli yarn prod

artisan config:cache
artisan route:cache
artisan view:cache

echo "Set APP_DEBUG=false and that's all :)"
