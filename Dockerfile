FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    mysql-client \
    git \
    zip \
    unzip \
    nodejs \
    npm \
    autoconf \
    g++ \
    make

RUN docker-php-ext-install pdo_mysql opcache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

EXPOSE 8000

CMD php-fpm -D