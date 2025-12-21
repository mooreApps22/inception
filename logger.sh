#!/bin/bash

function idFiles() {
	echo 'PWD:'
	pwd
	echo 'LS -L:'
	ls -l
	echo
}

function spit()
{
	echo "CATTING: $1"
	cat $1
}
make
echo
echo
echo
echo
echo
echo
echo
make ps
make logs
idFiles
tree -a -I .git
ls -l .env
spit .env
cd data
idFiles
cd mariadb
idFiles
cd ../wordpress
idFiles
cd ~/inception/srcs
idFiles
spit docker-compose.yml
cd requirements
idFiles
cd nginx
cat Dockerfile
cd utils
idFiles
spit gen_ssl.sh
spit nginx.conf

echo 'Note: my wordpress contaier is just a php-fpm container for the time being. I do not plan on adding the wordpress files until after I connect mariadb to my php documents and can interact with the database, through the php files.'

cd ../../wordpress
idFiles

echo 'Note: only echoing the files I thing are relevent right now.'

spit Dockerfile
spit www.conf
spit index.php
spit locations.php
spit database.php

cd ../mariadb
idFiles
spit Dockerfile
cd utils
spit entrypoint.sh
spit my.cnf
