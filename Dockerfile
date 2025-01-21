# Use an official PHP runtime as a parent image (PHP 8.2)
FROM php:8.2-cli

# Set the working directory inside the container
WORKDIR /var/www

# Copy the current directory contents into the container at /var/www
COPY . .

# Install dependencies, including Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    php composer.phar install

# Expose port 8000 to the host
EXPOSE 8000

# Start the PHP built-in server on port 8000, serving files from the public directory
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public", "index.php"]
