# Use an official PHP image from the Docker Hub
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies and tools needed for Composer
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy your PHP app code into the container
COPY . .

# Install Composer dependencies
RUN composer install

# Expose port 80
EXPOSE 80
