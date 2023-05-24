FROM php:8.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get -y upgrade \
  && apt-get install -y sendmail libpng-dev \
  && apt-get install -y libzip-dev \
  && apt-get install -y zlib1g-dev \
  && apt-get install -y libonig-dev \
  && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-install zip
RUN apt autoremove

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

RUN a2enmod rewrite