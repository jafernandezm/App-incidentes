FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libmcrypt-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Disable IPV6
#RUN echo "install ipv6 /bin/true" >> /etc/modprobe.d/disableipv6.conf

# Set Google DNS server
#127.0.0.1
RUN echo '#!/bin/sh\n\
echo "nameserver 127.0.0.1" > /etc/resolv.conf\n\
echo "nameserver 8.8.8.8" >> /etc/resolv.conf\n\
echo "nameserver 1.1.1.1" >> /etc/resolv.conf' > /tmp/update-resolv-conf.sh

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user

#RUN php artisan migrate:fresh --seed 
