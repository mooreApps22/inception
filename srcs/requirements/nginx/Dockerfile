FROM alpine:3.20

ARG SSL_SUBJECT
ENV SSL_SUBJECT=${SSL_SUBJECT}

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /var/www/ft


COPY utils/nginx.conf /etc/nginx/nginx.conf
COPY utils/gen_ssl.sh /etc/nginx/gen_ssl.sh

RUN	apk add openssl
RUN ["chmod", "+x", "/etc/nginx/gen_ssl.sh"]
RUN ["/etc/nginx/gen_ssl.sh"]

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]
