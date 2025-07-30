FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copy PHP configuration
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

WORKDIR /var/www/html

# Install dependencies
RUN composer install --no-interaction

RUN echo "DB_USER=\${DB_USER}" > .env && \
    echo "DB_PASSWORD=\${DB_PASSWORD}" >> .env && \
    echo "DSN=\${DSN}" >> .env

EXPOSE 9000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public/"]