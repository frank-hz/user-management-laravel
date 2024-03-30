# php version
FROM php:7.4

# mysql extension
RUN docker-php-ext-install mysqli

# timezone
RUN echo "date.timezone = America/Lima" > /usr/local/etc/php/conf.d/timezone.ini
