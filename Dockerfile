FROM php:8.2-apache

# Install system dependencies & PHP extensions
RUN apt-get update || true && apt-get install -y --fix-missing \
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

# Force fresh install of dependencies without legacy restrictions
RUN rm -rf vendor composer.lock \
    && composer update --no-interaction --prefer-dist --optimize-autoloader --no-scripts --ignore-platform-reqs

# Fix permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
