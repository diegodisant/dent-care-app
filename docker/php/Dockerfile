FROM php:8.0-fpm-alpine AS builder

WORKDIR /app

RUN docker-php-ext-install \
  pdo \
  pdo_mysql && \
  docker-php-ext-enable pdo_mysql

FROM builder

COPY . .

COPY docker/php/conf.d/php.ini ${PHP_INI_DIR}/conf.d/
