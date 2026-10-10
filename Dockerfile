FROM php:8.3-apache

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip intl mbstring

# Enable Apache ModRewrite
RUN a2enmod rewrite

# Update Apache DocumentRoot to point to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /app/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Grant Apache permissions to /app/public directory
RUN echo '<Directory /app/public/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy application files
COPY . .

# Clean composer install and publish assets during build
RUN rm -rf vendor composer.lock \
    && composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts \
    && php artisan filament:upgrade || true

# Create .env from .env.example if missing
RUN cp -n .env.example .env || true

EXPOSE 80

# Setup directories, permissions, migrations, seeders, storage link, and start apache
CMD mkdir -p /app/database \
    && mkdir -p /app/storage/app/public/livewire-tmp \
    && touch /app/database/database.sqlite \
    && chown -R www-data:www-data /app/database /app/storage /app/bootstrap/cache \
    && chmod -R 777 /app/database /app/storage /app/bootstrap/cache \
    && php artisan key:generate --force \
    && php artisan migrate --force \
    && php artisan db:seed --force \
    && php artisan storage:link --force \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && apache2-foreground
