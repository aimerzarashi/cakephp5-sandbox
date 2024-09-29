FROM php:8.3-apache

RUN curl -s https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer

RUN apt-get update \
  && apt-get install -y unzip \
  && apt-get install -y libicu-dev \
  && apt-get install -y libpq-dev \
  && docker-php-ext-install intl \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install pdo_pgsql \
  && a2enmod rewrite

COPY ./php/html/ /var/www/html/
COPY ./php/php.ini /usr/local/etc/php/

WORKDIR /var/www/html/