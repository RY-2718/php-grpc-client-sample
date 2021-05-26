FROM php:7.2-cli-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apk add --no-cache --allow-untrusted \
    libstdc++ \
    && apk add --no-cache --virtual=.build-deps --allow-untrusted \
    gcc \
    g++ \
    make \
    autoconf \
    zlib-dev \
    linux-headers \
    && pecl install -o -f \
    xdebug \
    protobuf \
    grpc \
    && docker-php-ext-enable \
    xdebug \
    protobuf \
    grpc \
    && apk del .build-deps \
    && apk del *-dev \
    && rm -rf /tmp/pear \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer \
    && mkdir -p /project/

WORKDIR /project