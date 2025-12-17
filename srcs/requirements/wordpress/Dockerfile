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


COPY www.conf /etc/php83/php-fpm.d/www.conf

COPY index.php /var/www/html/index.php
COPY second.php /var/www/html/second.php
COPY styles.css /var/www/html/styles.css
COPY about.php /var/www/html/about.php
COPY locations.php /var/www/html/locations.php
COPY header.html /var/www/html/header.html
COPY footer.html /var/www/html/footer.html
COPY database.php /var/www/html/database.php
COPY uploads.php /var/www/html/uploads.php

EXPOSE 9000

RUN mkdir -p /var/www/html/
RUN mkdir -p /var/www/html/uploads
RUN chown -R nginx:nginx /var/www/html/uploads
RUN chmod 777 /var/www/html/uploads

CMD ["php-fpm83", "-F"]
