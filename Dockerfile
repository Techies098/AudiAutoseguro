# Imagen base oficial de PHP con extensiones necesarias
FROM php:8.2-cli

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia los archivos del proyecto
COPY . .

# Instala dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Expone el puerto que Railway usará
EXPOSE 8080

# Usa el puerto de entorno de Railway o 8080 por defecto
ENV PORT=8080

# Comando para arrancar Laravel
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
