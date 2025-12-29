#!/bin/sh
set -e

echo

SOCK="/run/mysqld/mysqld.sock"

# Change user/group ownerships of directories
chown -R mysql:mysql /run/mysqld /var/lib/mysql

# Bootstrap MariaDB if doesn't exist
if [ ! -d "/var/lib/mysql/mysql" ];
then
	echo "Bootstraping MariaDB data directory..."
	mysql_install_db --user=mysql --datadir=/var/lib/mysql >/dev/null

# Start TEMP MariaDB Server ################################
	echo "Start temp MariaDB server for init..."
	mysqld --user=mysql --datadir=/var/lib/mysql \
		--skip-networking --socket="$SOCK" &
	tmp_pid="$!"

	until mysqladmin --socket="$SOCK" ping --silent
	do
		sleep 1
	done

	# SQL Statement to create database and user
	echo "Creating Database and User..."
	mysql --socket="$SOCK" -u root <<-EOSQL
		create database if not exists \`${MARIADB_DATABASE}\`;
		create user if not exists '${MARIADB_USER}'@'%' identified by '${MARIADB_PASSWORD}';
		grant all privileges on \`${MARIADB_DATABASE}\`.* to '${MARIADB_USER}'@'%';
		alter user 'root'@'localhost' identified by '${MARIADB_ROOT_PASSWORD}';
		flush privileges;
	EOSQL

	# Killing temp server
	echo "Shutting down temp MariaDB server..."
	mysqladmin --socket="$SOCK" shutdown
	wait "$tmp_pid" 2>/dev/null || true
fi


# Start Real MariaDB Server ################################
echo "Starting MariaDB..."
mysqld --user=mysql --datadir=/var/lib/mysql \
	--bind-address=0.0.0.0 --port=3306 --socket="$SOCK" &
pid="$!"

# Waiting for Real Server
echo "Waiting for MariaDB is the hardest part..."
until mysqladmin --socket="$SOCK" ping --silent
do
	sleep 1
done

# Check If Database has guest_list Table
echo "Checking for guest_list table..."
if mysql --socket="$SOCK" -u root -p"${MARIADB_ROOT_PASSWORD}" \
	-e "show tables from \`${MARIADB_DATABASE}\`; like 'guest_list';" \
	2>/dev/null | grep -q guest_list
then
	echo "The guest_list Table already exists"
else
	echo "Creating the guest_list Table..."
	mysql --socket="$SOCK" -u root \
		-p"${MARIADB_ROOT_PASSWORD}" <<-EOSQL
		use \`${MARIADB_DATABASE}\`;
		create table guest_list (
			id int auto_increment primary key,
			name varchar(100) not null
	);
	EOSQL
fi

# Keep mariadb(container) running for mysqld
wait "$pid"

echo
