#!/bin/bash

# variables
whoami=`whoami`
pwd=$(pwd)
container_id=$(docker ps -qf "name=wordpress")

echo " "
echo " "
echo " ================================================================= "
echo " "
echo " Enter inside wordpress container "
echo " "
echo " ================================================================= "
echo " "
echo " "
echo " "

docker exec -it $container_id /bin/bash

echo " "
echo " "
echo " Bye $whoami"
echo " "
echo " "