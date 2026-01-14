FROM composer:2 AS composer
FROM php:8.3-apache

# Instala extensões necessárias para Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip gd mbstring exif pcntl bcmath \
    && a2enmod rewrite

# Instala o Composer no container
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copia o código para dentro do container
WORKDIR /var/www/html
COPY . .

# Configura o Apache para apontar para a pasta "public"
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf
