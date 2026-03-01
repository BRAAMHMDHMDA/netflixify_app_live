# Stage 1 - Composer dependencies
FROM php:8.2-fpm AS composer_deps

# Install system dependencies
RUN apt-get update && apt-get install -y \
    ffmpeg git curl unzip libpq-dev libonig-dev libzip-dev libsqlite3-dev libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring intl zip gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Stage 2 - Build Frontend (Vite)
FROM node:18 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 3 - Backend (Laravel + PHP)
FROM php:8.2-fpm AS backend

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev libsqlite3-dev libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring intl zip gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .
# Copy vendor from Composer stage
COPY --from=composer_deps /var/www/vendor ./vendor

# Copy built frontend from Stage 1
COPY --from=frontend /app/public/build ./public/build

# Laravel runtime prep
RUN mkdir -p \
    storage/framework/views \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/testing \
    storage/logs \
    bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R ug+rwx storage bootstrap/cache

CMD ["sh", "-c", "mkdir -p storage/framework/views storage/framework/cache/data storage/framework/sessions storage/framework/testing storage/logs bootstrap/cache && chmod -R ug+rwx storage bootstrap/cache && php artisan storage:link || true; php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
