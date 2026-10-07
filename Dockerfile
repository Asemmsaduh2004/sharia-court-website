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

# Update dependencies to be compatible with PHP 8.3
RUN composer update symfony/http-foundation symfony/routing --no-interaction --ignore-platform-reqs

# Fix permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
