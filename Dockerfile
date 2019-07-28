FROM php:7-apache
COPY . /var/www/html

RUN apt-get update && apt-get upgrade -y
RUN apt install -y unzip git curl; \
php composer.phar install

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite