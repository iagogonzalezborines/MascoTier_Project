# Use the official PHP 8.3 with Apache image
FROM php:8.3-apache

# Switch to root user to perform installation tasks
USER root

# Install necessary PHP extensions for your application
RUN docker-php-ext-install mysqli pdo_mysql

# Enable Apache mod_rewrite module
RUN a2enmod rewrite

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apt-get update && \
    apt-get install -y \
        nodejs \
        npm \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory
WORKDIR /var/www/html

# Copy the PHP configuration file
COPY config/php.ini /usr/local/etc/php/php.ini

# Copy the application files to the web server directory
COPY src/ /var/www/html/

# Expose port 80 for Apache
EXPOSE 80

# Command to start Apache when the container runs
CMD ["apache2-foreground"]
