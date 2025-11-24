FROM php:8.2-apache

# Habilitar las extensiones necesarias para conectarse a MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el proyecto al servidor Apache
COPY . /var/www/html/

# Dar permisos a la carpeta si usas uploads
RUN chown -R www-data:www-data /var/www/html

# Activar módulo de Apache para .htaccess si lo usas
RUN a2enmod rewrite
