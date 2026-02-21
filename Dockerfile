FROM php:8.5-alpine3.23

LABEL maintainer="felipesantos2"
# https://www.docker.com/blog/docker-best-practices-using-arg-and-env-in-your-dockerfiles/
WORKDIR /app

# RUN apk update && apk upgrade

RUN apk add bash --no-cache \
    build-base \    
    curl \
    git \
    npm \
    autoconf \
    linux-headers

# add composer and php extensions
# https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php 
ARG HASH=$(curl -sS https://composer.github.io/installer.sig)
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    rm -rf ~/tmp 

RUN apk clean cache 

RUN pecl install xdebug-3.5.0 \
    tar \
    lzf \
    && docker-php-ext-enable xdebug \
    tar \
    lzf