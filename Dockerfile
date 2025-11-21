FROM composer:2 AS builder
WORKDIR /app

RUN composer create-project laravel/laravel . --prefer-dist --no-interaction

COPY app_src/ /app/
COPY app_src/.env /app/.env

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN php artisan key:generate --force || true



FROM php:8.2-fpm

RUN apt-get update && apt-get install -y libzip-dev zip unzip libpng-dev libonig-dev netcat-traditional \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip


# Copia aplicação já construída
COPY --from=builder /app /var/www/html

# Copia script de espera pelo MySQL
COPY wait-for-mysql.sh /usr/local/bin/wait-for-mysql.sh
RUN chmod +x /usr/local/bin/wait-for-mysql.sh

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["sh", "/usr/local/bin/wait-for-mysql.sh"]
