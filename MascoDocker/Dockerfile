# Use an official PHP runtime as a parent image
FROM php:8.3-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install additional PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and NPM for JavaScript dependencies
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Copy package files and install dependencies
COPY package.json .
COPY package-lock.json .
RUN npm install

# Copy the rest of the application code
COPY . /var/www/html

# Install Composer dependencies
RUN composer install

# Copy your custom php.ini file
COPY ./config/php.ini /usr/local/etc/php/php.ini

# Define environment variable for Xdebug
ENV XDEBUG_CONFIG="remote_host=host.docker.internal remote_port=9003 remote_enable=1"

# Run Apache when the container launches
CMD ["npm", "run", "watch:css"]
