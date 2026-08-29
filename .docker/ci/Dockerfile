FROM php:8.5-cli-alpine

# 1. Install dependensi sistem & library C untuk ekstensi intl/zip
RUN apk add --no-cache \
    git \
    curl \
    unzip \
    zip \
    tar \
    openssh-client \
    nodejs \
    npm \
    icu-dev \
    libzip-dev

# 2. Install & aktifkan ekstensi PHP intl & zip
RUN docker-php-ext-install intl zip

# 3. Install Composer dari image resmi
COPY --from=docker.io/library/composer:latest /usr/bin/composer /usr/bin/composer

# 4. Izinkan semua direktori di Git (mengatasi dubious ownership di Jenkins)
RUN git config --global --add safe.directory '*'

WORKDIR /app