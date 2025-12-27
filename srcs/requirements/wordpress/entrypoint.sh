#!/bin/sh
set -e

if [ -z "$(ls -A /var/www/html 2>/dev/null)" ]
then
	echo "Seeding WordPress files..."
	cp -a /usr/src/wordpress/. /var/www/html/
else
	echo "WordPress volume already initialized."
fi

exec "$@"
