FROM alpine:3.20

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf

COPY index.html /var/www/html/index.html
COPY styles.css /var/www/html/styles.css

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
