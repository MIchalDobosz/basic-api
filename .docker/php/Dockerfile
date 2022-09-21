FROM php:8.1-apache

# Debian config
RUN apt-get update && apt-get install -y \
    git \
    libpq-dev

# PHP config
RUN docker-php-ext-install \
    pdo_pgsql
    
# Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Apache config
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache/apache2.conf /etc/apache2/apache2.conf
RUN a2enmod rewrite