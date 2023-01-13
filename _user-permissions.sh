#!/bin/bash

# variables
whoami=`whoami`
pwd=$(pwd)
container_id=$(docker ps -qf "name=wordpress")

echo " "
echo " "
echo " ================================================================= "
echo " "
echo " Setting Permissions in $pwd/cms/wp-content/themes"
echo " "
echo " ================================================================= "
echo " "
echo " "
echo " "

# docker exec -it $container_id /bin/bash

docker exec -it $container_id /bin/bash -c "
chown -R 1000:1000 /var/www/html/wp-content/themes
cd /var/www/html/wp-content
ls -lah
"

docker exec -it $container_id /bin/bash -c "
cd /var/www/html/wp-content/themes

ls -lah"

echo " "
echo " "
echo " Bye $whoami"
echo " "
echo " "