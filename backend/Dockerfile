# Base image with PHP 8.3 CLI
FROM php:8.3-cli

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PostgreSQL libraries
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    unzip \
    zip \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_pgsql \
        pgsql \
        pdo_mysql \
        gd \
        zip \
        bcmath \
        intl \
        mbstring \
        exif \
        pcntl \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install official Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Install Composer dependencies for production
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set execute permissions for entrypoint script
RUN chmod +x /var/www/html/docker-entrypoint.sh

# Expose Render dynamic PORT (default 10000)
EXPOSE 10000

# Start Laravel using entrypoint script
ENTRYPOINT ["/var/www/html/docker-entrypoint.sh"]
