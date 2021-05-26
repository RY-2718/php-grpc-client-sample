FROM alpine:3.12

RUN apk add --no-cache --allow-untrusted \
    libstdc++ \
    libtool \
    linux-headers \
    zlib-dev \
    protoc \
    && apk add --virtual=.build-deps --no-cache --allow-untrusted \
    gcc \
    g++ \
    git \
    make \
    automake \
    autoconf \
    && git clone --recursive -b v1.34.1 https://github.com/grpc/grpc \
    && cd grpc \
    && make grpc_php_plugin \
    && mv bins/opt/grpc_php_plugin /usr/local/bin \
    && apk del .build-deps \
    && apk del *-dev \
    && cd .. \
    && rm -rf grpc \
    && mkdir -p /project

WORKDIR /project