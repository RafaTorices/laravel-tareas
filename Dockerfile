# Usamos una imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias (como git, libzip, etc.)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    npm \
    && docker-php-ext-install zip pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activar mod_rewrite de Apache (necesario para Laravel)
RUN a2enmod rewrite

# Copiar el archivo de configuración de Apache para Laravel
COPY ./default.conf /etc/apache2/sites-available/000-default.conf

# Establecer el directorio de trabajo en la carpeta de apache
WORKDIR /var/www/html

# Copiar el código de la aplicación Laravel al contenedor
COPY ./src /var/www/html

# Cambiar los permisos de los archivos de la aplicación
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto 80 de Apache
EXPOSE 80

