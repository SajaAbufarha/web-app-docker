# Use the official PHP image as base
FROM php:latest

# Install additional dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    && docker-php-ext-install mysqli pdo_mysql gd

# Set working directory
WORKDIR /var/www/html

# Copy PHP files into the container
COPY . /var/www/html

# Expose port
EXPOSE 80

# Command to run the PHP application
CMD ["php", "-S", "0.0.0.0:80"]
