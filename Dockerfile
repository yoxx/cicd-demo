FROM composer:2 as builder

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --ignore-platform-reqs \
    --no-ansi \
    --no-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts

COPY . .

RUN composer dump-autoload -a --apcu

FROM php:8-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo_mysql apcu opcache

WORKDIR /srv

COPY --from=builder /app/vendor ./vendor
COPY . .
