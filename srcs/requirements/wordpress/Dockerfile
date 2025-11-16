FROM alpine:3.20

RUN apk add --no-cache \
	php83 \
	php83-fpm \
	php83-mysqli \
	php83-session \
	php83-json \
	php83-opcache \
	php83-mbstring \
	php83-xml \
	php83-curl \
	php83-gd \
	php83-ctype 

RUN mkdir -p /var/www/html

COPY www.conf /etc/php83/php-fpm.d/www.conf

COPY index.php /var/www/html/index.php

EXPOSE 9000

CMD ["php-fpm83", "-F"]
