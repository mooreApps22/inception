FROM alpine:3.20

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /var/www/ft


COPY utils/nginx.conf /etc/nginx/nginx.conf
COPY utils/gen_ssl.sh /etc/nginx/gen_ssl.sh

RUN	apk add openssl
RUN ["chmod", "+x", "/etc/nginx/gen_ssl.sh"]
RUN ["/etc/nginx/gen_ssl.sh"]

COPY static_web_files/index.html /var/www/ft/index.html
COPY static_web_files/styles.css /var/www/ft/styles.css


EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]
