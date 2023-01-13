#!/bin/bash

# variables
pwd=$(pwd)

echo " "
echo " "
echo " ================================================================= "
echo " "
echo " Down containers in $pwd/cms/"
echo " "
echo " ================================================================= "
echo " "
echo " "
echo " "

cd $pwd/cms
docker-compose down
