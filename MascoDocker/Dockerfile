# Usa la imagen oficial de PHP 8.3 con Apache
FROM php:8.3-apache
USER root

# Instala las extensiones necesarias para tu aplicación
RUN docker-php-ext-install mysqli pdo_mysql

# Habilita el módulo de Apache mod_rewrite
RUN a2enmod rewrite

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura el contenedor para usar el archivo de configuración personalizado php.ini
COPY config/php.ini /usr/local/etc/php/php.ini

# Copia los archivos de la aplicación al directorio del servidor web
COPY src/ /var/www/html/

# Exponer el puerto 80 para que Apache pueda escuchar
EXPOSE 80

# create pino user and grant var www html permissions
RUN useradd -ms /bin/bash mascoadmin
RUN chown -R mascoadmin:mascoadmin /var/www/html
RUN find /var/www/html/templates -type d -exec chmod 755 {} \; -o -type f -exec chmod 744 {} \;


USER  mascoadmin
# Inicia Apache cuando se ejecuta el contenedor
CMD ["apache2-foreground"]
