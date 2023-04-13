ARG COMPOSER_VERSION
ARG PHP_VERSION

FROM composer:$COMPOSER_VERSION AS composer

FROM php:$PHP_VERSION-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

## Installing Xdebug
RUN apk add git vim libxml2-dev &&\
    apk add --update linux-headers \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-install soap && docker-php-ext-enable xdebug \
    && apk del -f .build-deps && \
       apk add libzip-dev \
             zip \
    && apk --no-cache add \
        postgresql-dev\
    && docker-php-ext-install zip \
    && apk add --no-cache libpng libpng-dev \
    && docker-php-ext-install gd \
    && apk del libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql\
    && apk add --update npm


#Configure terminal
ENV XTERM=xterm-256color
