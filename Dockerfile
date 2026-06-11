FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
# Install PHP dependencies into vendor folder
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

FROM php:8.1-apache

# System deps and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev zip unzip git libpng-dev libxml2-dev libonig-dev \
    && docker-php-ext-install pdo_mysql zip gd mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy application
COPY . /var/www/html
COPY --from=vendor /app/vendor /var/www/html/vendor

# Set permissions for storage & cache
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Use public as document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!DocumentRoot /var/www/html!DocumentRoot /var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Listen on 8080 (Render expects a reachable port; set service to 8080)
RUN sed -i 's/Listen 80/Listen 8080/g' /etc/apache2/ports.conf \
    && sed -i 's/:80>/:8080>/g' /etc/apache2/sites-available/000-default.conf
ENV PORT 8080

EXPOSE 8080
CMD ["apache2-foreground"]
