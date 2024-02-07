# Dockerfile para el servicio principal (php8.3 con Apache)
FROM php:8.3-apache AS build-php

# Actualizar e instalar actualizaciones del sistema
RUN apt-get update && apt-get upgrade -y && apt-get clean && apt-get autoremove -y

# Instalar y habilitar Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Instalar extensiones necesarias para MySQL y habilitarlas
RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Instalar Tailwind CSS
WORKDIR /var/www/html
COPY . .
RUN npm install tailwindcss postcss autoprefixer
RUN npx tailwindcss init -p