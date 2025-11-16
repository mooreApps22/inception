FROM alpine:3.20

RUN apk add --no-cache nginx \
	&& mkdir -p /run/nginx /usr/share/nginx/html

COPY nginx.conf /etc/nginx/nginx.conf

COPY index.html /usr/share/nginx/html/index.html
COPY styles.css /usr/share/nginx/html/styles.css
COPY /images/circle.png /usr/share/nginx/html/circle.png
COPY /images/triangle.png /usr/share/nginx/html/triangle.png
COPY /images/square.png /usr/share/nginx/html/square.png
COPY /images/portal.jpg /usr/share/nginx/html/portal.jpg

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
