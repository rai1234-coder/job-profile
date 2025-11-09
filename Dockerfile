# Stage 1: Build dependencies
FROM composer:latest as composer_build

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-autoloader --no-scripts --optimize-autoloader

# Stage 2: Production image
FROM php:8.2-fpm-alpine

# Install system dependencies and PHP extensions
RUN apk update && apk add --no-cache \
    nginx \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    shadow \
    mysql-client \
    git \
    nodejs \
    npm \
    php-pdo_mysql \
    php-mbstring \
    php-xml \
    php-json \
    php-ctype \
    php-dom \
    php-fileinfo \
    php-tokenizer \
    php-bcmath \
    php-gd \
    php-openssl

# Copy Composer dependencies from the build stage
COPY --from=composer_build /app/vendor /var/www/html/vendor

# Copy application code
WORKDIR /var/www/html
COPY . .

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Configure Nginx
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 80 for Nginx
EXPOSE 80

# Start PHP-FPM and Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]