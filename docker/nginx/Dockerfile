FROM openresty/openresty:alpine AS builder

WORKDIR /app

FROM builder

COPY . .

COPY docker/nginx/conf.d/app.conf /etc/nginx/conf.d/default.conf
