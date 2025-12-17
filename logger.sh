#!/bin/bash

echo
echo
echo
echo
echo 'This is a logging script to make printing what I currently have. Let me know if any other info would be useful.'
echo
echo 'make logs'
make logs
echo
echo 'make ps'
make ps
echo
echo 'pwd'
pwd
echo
echo 'ls'
ls
echo
echo 'srcs/docker-compose.yml'
cat srcs/docker-compose.yml
echo
echo 'srcs/requirements/nginx/Dockerfile'
cat srcs/requirements/nginx/Dockerfile
echo
echo 'srcs/requirements/wordpress/Dockerfile'
cat srcs/requirements/wordpress/Dockerfile
echo
echo 'srcs/requirements/mariadb/Dockerfile'
cat srcs/requirements/mariadb/Dockerfile
echo
echo 'ls data'
ls data
echo
echo 'srcs/requirements/nginx/utils/nginx.conf'
cat srcs/requirements/nginx/utils/nginx.conf
echo
echo 'srcs/requirements/wordpress/www.conf'
cat srcs/requirements/wordpress/www.conf

