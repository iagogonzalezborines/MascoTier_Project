# Extiende la imagen existente (php8.3 con Apache)
FROM php:8.3-apache AS build-php

# Actualizar e instalar actualizaciones del sistema
RUN apt-get update && apt-get upgrade -y && apt-get clean && apt-get autoremove -y

# Instalar y habilitar Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Instalar extensiones necesarias para MySQL y habilitarlas
RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Instalar Node.js y npm
RUN apt-get install -y nodejs npm

# Instalar Tailwind CSS CLI de forma global
RUN npm install -g -D tailwindcss postcss autoprefixer

# Compilar los estilos de Tailwind CSS
RUN npx tailwindcss build -i ./src/input.css -o ./dist/output.css

# Establecer el directorio de trabajo en /app
WORKDIR /src

# Copiar los archivos package.json y package-lock.json al directorio de trabajo
COPY package*.json ./

# Instalar las dependencias del proyecto
RUN npm install

# Copiar el resto de los archivos al directorio de trabajo
COPY . .

# Especificar el comando predeterminado para ejecutar cuando se inicie el contenedor
CMD ["npm", "start"]
