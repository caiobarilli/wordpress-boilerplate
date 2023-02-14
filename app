#!/usr/bin/env bash

str=$1
container_id=$(docker ps -qf "name=wordpress")
pwd=$(pwd)

# Up container
if [ "$str" = "up" ]; then
    cd $pwd/cms
    docker-compose up -d
fi

# Down container
if [ "$str" = "down" ]; then
    cd $pwd/cms
    docker-compose down
fi

# Bash do container
if [ "$str" = "bash" ]; then
    docker exec -it $container_id /bin/bash
fi

# Permissões do container
if [ "$str" = "permissions" ]; then
    docker exec -it $container_id /bin/bash -c "
    chown -R www-data:www-data /var/www/html/
    cd /var/www/html/wp-content
    ls -lah
    "

    docker exec -it $container_id /bin/bash -c "
    cd /var/www/html/wp-content/themes
    ls -lah
    "
fi

# Permissões de desenvolvimento
if [ "$str" = "dev" ]; then
    docker exec -it $container_id /bin/bash -c "
    chown -R 1000:1000 /var/www/html/wp-content/themes
    cd /var/www/html/wp-content
    ls -lah
    "

    docker exec -it $container_id /bin/bash -c "
    cd /var/www/html/wp-content/themes
    ls -lah
    "
fi
