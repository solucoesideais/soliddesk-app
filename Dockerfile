#Building php dependencies
FROM php:7.2-apache as php-dependencies

COPY ./docker/apache/virtualhost.conf /etc/apache2/sites-enabled/000-default.conf

COPY ./docker/php/opcache.ini /usr/local/etc/php/conf.d/

RUN apt-get update \
    && apt-get install -y --no-install-recommends zip zlib1g-dev \
    && docker-php-ext-install zip pdo pdo_mysql opcache \
    && a2enmod rewrite

#Building node denpendencies
FROM node:9.7 as node-dependencies

RUN apt-get update \
    && apt-get install -y nasm

#Building BACKEND
FROM php-dependencies as backend

COPY ./ /var/www

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && composer install --no-interaction --no-dev

#Building FRONTEND
FROM node-dependencies as frontend

COPY ./ /var/www

WORKDIR /var/www

RUN yarn install --non-interactive --no-progress \
    && yarn production

#Building application
FROM php-dependencies

COPY ./ /var/www

COPY --from=frontend /var/www/public /var/www/public

COPY --from=backend /var/www/vendor /var/www/vendor

WORKDIR /var/www

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
