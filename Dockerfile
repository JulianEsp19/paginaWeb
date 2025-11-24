FROM php:8.2-apache

# Instalar dependencias necesarias para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

# Si también usas MySQL, puedes dejar estas extensiones:
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el proyecto al servidor Apache
COPY . /var/www/html/

# Dar permisos a la carpeta si usas uploads
RUN chown -R www-data:www-data /var/www/html

# Activar módulo de Apache para .htaccess
RUN a2enmod rewrite
