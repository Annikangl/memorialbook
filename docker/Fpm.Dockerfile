FROM php:8.0.1-fpm

RUN apt-get --allow-releaseinfo-change-suite update \
    && docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/memorailbook
