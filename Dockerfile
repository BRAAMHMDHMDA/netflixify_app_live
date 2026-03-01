# Stage 1 - Composer dependencies
FROM php:8.2-fpm AS composer_deps

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    libsqlite3-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    intl \
    zip \
    bcmath \
    gd \
    exif \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Stage 2 - Build Frontend (Vite)
FROM node:18-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi
COPY . .
RUN npm run build

# Stage 3 - Runtime (Laravel + PHP + ffmpeg)
FROM php:8.2-fpm AS backend

RUN apt-get update && apt-get install -y --no-install-recommends \
    ffmpeg \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    libsqlite3-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    intl \
    zip \
    bcmath \
    gd \
    exif \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY . .
COPY --from=composer_deps /var/www/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

# Laravel setup
RUN rm -f bootstrap/cache/\*.php && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan storage:link

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
