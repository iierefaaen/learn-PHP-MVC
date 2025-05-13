FROM php:8.4-fpm-alpine3.20

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

EXPOSE 9000