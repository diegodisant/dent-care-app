#!/bin/bash

# default aliases
dcli() {
    docker compose -f docker-compose.cli.yml run --rm "$@"
}

artisan() {
    docker compose run --rm artisan "$@"
}

# settings
cp .env.example .env
cp docker-compose.override.yml.dist docker-compose.override.yml

# build + latest images
docker compose build
docker compose -f docker-compose.cli.yml pull

# deps
dcli composer install
dcli yarn install
dcli yarn dev

docker compose up -d && sleep 30

# database initial
artisan migrate
artisan db:seed
