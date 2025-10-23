FROM alpine:3.20

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /usr/share/nginx/html

COPY nginx.conf /etc/nginx/nginx.conf

COPY index.html /usr/share/nginx/html/index.html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
