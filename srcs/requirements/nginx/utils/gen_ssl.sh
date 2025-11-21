#!/bin/sh
set -e

CN="smoore.42.fr"
EMAIL="skyymoore@gmail.com"


openssl genrsa -out /etc/nginx/ft_private.key 2048

openssl rsa -in /etc/nginx/ft_private.key -pubout -out /etc/nginx/ft_public.key


openssl req \
	-new -x509 \
	-key /etc/nginx/ft_private.key \
	-out /etc/nginx/ft_cert.crt \
	-days 365 \
	-subj "/C=US/ST=California/L=Los Angeles/O=42 London/OU=Common Core/CN=$CN/emailAddress=$EMAIL"
