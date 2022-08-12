FROM php:8.1.1-apache
ARG XDEBUG_VERSION=3.1.4

RUN mkdir -p ~/.gnupg/private-keys-v1.d
RUN chmod 700 ~/.gnupg/private-keys-v1.d

RUN apt update \
    && apt install -qqy libpq-dev libzip-dev libpng-dev libonig-dev libxml2-dev git \
                    unzip libfreetype6-dev libjpeg62-turbo-dev \
                    libpng-dev libaio1 wget \
    && apt-get clean autoclean \
    && apt-get autoremove --yes \
    &&  rm -rf /var/lib/{apt,dpkg,cache,log}/
RUN docker-php-ext-install gd xml zip mbstring

RUN pecl install xdebug-3.1.4 && docker-php-ext-enable xdebug \
    && echo "xdebug.client_port=9000" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/php.ini

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
     && docker-php-ext-install pdo pdo_pgsql pgsql

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

WORKDIR /var/www/app

# Instalando o Composer
RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
COPY . /var/www/app
COPY ./.docker/api.conf /etc/apache2/sites-enabled
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite
RUN chmod 777 storage/ -R
VOLUME /var/www/app
