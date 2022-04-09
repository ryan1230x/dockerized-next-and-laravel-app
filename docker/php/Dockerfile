FROM php:7.4-apache

RUN apt update  && apt install -y g++ libicu-dev libpq-dev libzip-dev zip zlib1g-dev && docker-php-ext-install intl opcache pdo pdo_mysql mysqli pdo_pgsql pgsql 

RUN a2enmod rewrite headers

WORKDIR /var/www/html

RUN usermod -u 1000 www-data

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
