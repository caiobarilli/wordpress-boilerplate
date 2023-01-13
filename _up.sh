#!/bin/bash

# variables
pwd=$(pwd)

echo " "
echo " "
echo " ================================================================= "
echo " "
echo " Up containers in $pwd/cms/"
echo " "
echo " ================================================================= "
echo " "
echo " "
echo " "

cd $pwd/cms
docker-compose up -d
