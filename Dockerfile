FROM php:8.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libcurl4-openssl-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    gawk && \
    docker-php-ext-install pdo pdo_mysql xml curl zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_23.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

