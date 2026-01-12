#!/bin/sh
set -e

WP_PATH="/var/www/html"
SEED="/usr/src/wordpress"

# From .env
: "${MARIADB_HOST:? Missing MARIADB_HOST}"
: "${MARIADB_DATABASE:? Missing MARIADB_DATABASE}"
: "${MARIADB_USER:? Missing MARIADB_USER}"
: "${MARIADB_PASSWORD:? Missing MARIADB_PASSWORD}"

: "${WP_URL:=https://${SERVER_NAME}}"
: "${WP_TITLE:=Inception}"
: "${WP_ADMIN_USER:=admin}"
: "${WP_ADMIN_PASSWORD:=admin123}"
: "${WP_ADMIN_EMAIL:=admin@example.com}"

mkdir -p "$WP_PATH"

#_________________OLD__________________________
#if [ -z "$(ls -A /var/www/html 2>/dev/null)" ]
#then
#	echo "Seeding WordPress files..."
#	cp -a /usr/src/wordpress/. /var/www/html/
#else
#	echo "WordPress volume already initialized."
#fi

if [ ! -f "$WP_PATH/wp-includes/version.php" ]
then
	echo "Seeding WordPress core into volume..."
	cp -a "$SEED/." "$WP_PATH/"
fi

mkdir -p "$WP_PATH/wp-content/uploads"
chown -R nginx:nginx "$WP_PATH/wp-content"
chmod -R 755 "$WP_PATH/wp-content"
chmod -R 755 "$WP_PATH/wp-content/uploads"

if [ ! -f "$WP_PATH/wp-config.php" ];
then
	echo "Creating that sweet, sweet wp-config.php..."
	cd "$WP_PATH"

	wp config create \
		--allow-root \
		--path="$WP_PATH" \
		--dbname="$MARIADB_DATABASE" \
		--dbuser="$MARIADB_USER" \
		--dbpass="$MARIADB_PASSWORD" \
		--dbhost="$MARIADB_HOST" \
		--skip-check \
		--force

	wp config set --allow-root --path="$WP_PATH" WP_DEBUG false --raw
	wp config set --allow-root --path="$WP_PATH" FS_METHOD direct
fi

echo "Waiting for MariaDB at $MARIADB_HOST..."
until mysqladmin ping -h"$MARIADB_HOST" -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" --silent
do
	sleep 1
done

if ! wp core is-installed --allow-root --path="$WP_PATH" >/dev/null 2>&1
then
	echo "Running wp core install..."
	wp core install \
		--allow-root \
		--path="$WP_PATH" \
		--url="$WP_URL" \
		--title="$WP_TITLE" \
		--admin_user="$WP_ADMIN_USER" \
		--admin_password="$WP_ADMIN_PASSWORD" \
		--admin_email="$WP_ADMIN_EMAIL" \
		--skip-email
else
	echo "WordPress already installed."
fi

if [ -n "${WP_USER:-}" ] && wp core is-installed --allow-root --path="$WP_PATH" >/dev/null 2>&1
then
	if ! wp user get "$WP_USER" --allow-root --path="$WP_PATH" >/dev/null 2>&1
	then
		wp user create "$WP_USER" "${WP_USER_EMAIL:-$WP_USER@example.com}" \
			--role="${WP_USER_ROLE:-subscriber}" \
			--user_pass="${WP_USER_PASSWORD:-}" \
			--allow-root --path="$WP_PATH"
	else
		echo "User $WP_USER alredy exists."
	fi
fi

#Auto-approve comments
if wp core is-installed --allow-root --path="$WP_PATH" >/dev/null 2>&1
then
	wp option update comment_moderation 0 --allow-root --path="$WP_PATH"
	wp option update comment_whitelist 0 --allow-root --path="$WP_PATH"
fi



exec "$@"
