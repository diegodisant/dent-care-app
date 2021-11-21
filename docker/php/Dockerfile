FROM php:8.0-fpm-alpine AS builder

WORKDIR /app

FROM builder

COPY . .

COPY docker/php/conf.d/php.ini ${PHP_INI_DIR}/conf.d/
