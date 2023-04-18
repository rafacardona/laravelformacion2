#!/bin/sh -

# Si existe el archivo de environment lo borramos
if [ -e Docker/.env ]; then
    rm Docker/.env
fi

# Creamos el archivo de environment

touch Docker/.env
echo 'ROOT='$(pwd) >> 'Docker/.env'
echo "COMPOSE_PROJECT_NAME=${PROJECT_NAME}" >> 'Docker/.env'
echo "SERVERNAME=${PROJECT_NAME}" >> 'Docker/.env'
echo "PHPCONTAINER=php_${PROJECT_NAME}" >> 'Docker/.env'
echo "NGINXCONTAINER=nginx_${PROJECT_NAME}" >> 'Docker/.env'
echo "COMPOSER_VERSION=${COMPOSER_VERSION}" >> 'Docker/.env'
echo "PHP_VERSION=${PHP_VERSION}" >> 'Docker/.env'
echo "WORKDIR=/var/www/html" >> 'Docker/.env'
echo "DOMAIN=docker.localhost" >> 'Docker/.env'
echo "POSTGRESCONTAINER=postgres_${PROJECT_NAME}" >> 'Docker/.env'
echo "POSTGRES_PASSWORD=password" >> 'Docker/.env'
echo "UID=1000" >> 'Docker/.env'
echo "GID=1001" >> 'Docker/.env'
