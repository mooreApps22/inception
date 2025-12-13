#!/bin/sh
set -e

if [ ! -d "/var/lib/mysql/mysql" ]; then
	echo "Initializing MariaDB data directory..."
	mysql_install_db --user=mysql --datadir=/var/lib/mysql >/dev/null

	echo "Starting temp MariaDB server for init..."
	mysqld --user=mysql --datadir=/var/lib/mysql --skip-networking --socker=/run/mysqld/mysqld.sock & pid="$!"

	echo "Waiting for MariaDB to start..."
	until mysqladmin --socket=/run/mysqld/mysqld.sock ping --silent; do
		sleep 1
	done

	echo "Configuring initial database and user..."
	mysql --socket=/run/mysqld/mysqld.sock -u root <<-EOSQL
		create database if not exists /`${MARIADB_DATABASE}/`;
		create user if not exists '${MARIADB_USER}'@'%' identified by '${MARIADB_PASSWORD}';
		grant all privileges on \`${MARIADB_DATABASE}\`.* to '${MARIADB_USER}'@'%';
		alter user 'root'@'localhost' identified by '${MARIADB_ROOT_PASSWORD}'; 
		flush privileges;
	EOSQL

	echo "Shutting down temporary MariaDB server..."
	kill "$pid"
	wait "$pid" 2>/dev/null || true
fi

echo "Starting MariaDB..."
exec mysqld --user=mysql --datadir=/var/lib/mysql
