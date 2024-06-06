# Use the official PHP image as a base
FROM php:8.2-fpm

# Set the environment variable
ENV DEBIAN_FRONTEND=noninteractive

# Copy the composer files
COPY composer.lock composer.json /var/www/

# Set the working directory
WORKDIR /var/www

# Install system dependencies
RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
    curl \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libssl-dev \
    libwebp-dev \
    libxpm-dev \
    libmcrypt-dev \
    libonig-dev; \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN set -eux; \
    docker-php-ext-install pdo_mysql pdo_pgsql; \
    docker-php-ext-configure gd \
    --prefix=/usr \
    --with-jpeg \
    --with-webp \
    --with-xpm \
    --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'

# Create a user group and user for the web application
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

# Copy the application code and set the appropriate permissions
COPY --chown=www:www . /var/www

# Set correct permissions for storage and bootstrap/cache directories
RUN chmod 777 -R /var/www/app
RUN chmod -R 777 storage/

# Switch to the non-root user
USER www

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]