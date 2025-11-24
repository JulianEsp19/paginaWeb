FROM php:8.2-apache

# -----------------------------
# Instalar certificados SSL (NECESARIO PARA RENDER POSTGRES)
# -----------------------------
RUN apt-get update && apt-get install -y \
    ca-certificates \
    libpq-dev

# -----------------------------
# Extensiones necesarias para PostgreSQL
# -----------------------------
RUN docker-php-ext-install pgsql pdo_pgsql

# -----------------------------
# (Opcional) Extensiones para MySQL
# Déjalas solo si realmente las necesitas
# -----------------------------
RUN docker-php-ext-install mysqli pdo pdo_mysql

# -----------------------------
# Copiar proyecto al servidor Apache
# -----------------------------
COPY . /var/www/html/

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html

# Activar mod_rewrite (si usas .htaccess)
RUN a2enmod rewrite
