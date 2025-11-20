FROM alpine:3.20

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /var/www/html

COPY utils/nginx.conf /etc/nginx/nginx.conf

COPY static_web_files/index.html /var/www/html/index.html
COPY static_web_files/styles.css /var/www/html/styles.css

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
