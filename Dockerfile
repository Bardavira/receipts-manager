FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    unzip \
    zip \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /app