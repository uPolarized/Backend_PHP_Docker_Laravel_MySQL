#!/bin/sh

echo "Aguardando MySQL iniciar..."

until nc -z db 3306; do
  sleep 1
done

echo "MySQL está pronto. Executando migrations..."

php artisan migrate --force

exec php-fpm
