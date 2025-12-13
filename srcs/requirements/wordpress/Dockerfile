FROM alpine:3.20

RUN apk add --no-cache \
	php83 \
	php83-fpm \
	php83-mysqli \
	php83-pdo \
	php83-pdo_mysql \
	php83-session \
	php83-json \
	php83-opcache \
	php83-mbstring \
	php83-xml \
	php83-curl \
	php83-gd \
	php83-ctype 

RUN echo "display_errors = On" >> /etc/php83/php.ini

RUN addgroup -S nginx && adduser -S -G nginx nginx

RUN mkdir -p /var/www/ft/

COPY www.conf /etc/php83/php-fpm.d/www.conf

COPY index.php /var/www/ft/index.php
COPY about.php /var/www/ft/about.php
COPY locations.php /var/www/ft/locations.php
COPY header.html /var/www/ft/header.html
COPY footer.html /var/www/ft/footer.html
COPY database.php /var/www/ft/database.php

EXPOSE 9000

CMD ["php-fpm83", "-F"]
