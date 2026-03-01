# Stage 1 - Composer dependencies
FROM php:8.2-fpm AS composer_deps

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    libsqlite3-dev \
    && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    intl \
    zip \
    bcmath \
    exif \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Stage 2 - Build Frontend (Vite)
FROM node:18-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
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
    && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    intl \
    zip \
    bcmath \
    exif \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
ENV FFMPEG_BINARIES=ffmpeg
ENV FFPROBE_BINARIES=ffprobe
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/database/database.sqlite

COPY . .
COPY --from=composer_deps /var/www/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

RUN touch database/database.sqlite && \
    mkdir -p storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache && \
    chown www-data:www-data database/database.sqlite && \
    chmod -R ug+rwx storage bootstrap/cache

EXPOSE 8000
CMD ["sh", "-c", "mkdir -p database && touch ${DB_DATABASE:-/var/www/database/database.sqlite} && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
