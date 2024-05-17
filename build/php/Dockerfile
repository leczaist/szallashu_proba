FROM php:7.4-apache

RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql exif

RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY apache.conf /etc/apache2/sites-available/site.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2ensite site
RUN a2enmod rewrite
