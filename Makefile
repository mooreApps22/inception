YAM = ./srcs/docker-compose.yml
ENV = --env-file ./.env

all:
	docker compose $(ENV) -f $(YAM) down
	docker compose $(ENV) -f $(YAM) up -d --build
up:
	docker compose $(ENV) -f $(YAM) up --build
upd:
	docker compose $(ENV) -f $(YAM) up -d --build
down:
	docker compose $(ENV) -f $(YAM) down
down_v:
	docker compose $(ENV) -f $(YAM) down -v
restart:
	docker compose -f $(YAM) down
	docker compose $(ENV) -f $(YAM) up -d --build
ps:
	docker compose -f $(YAM) ps 
logs:
	docker compose -f $(YAM) logs
logs_mariadb:
	docker logs mariadb
logs_wordpress:
	docker logs wordpress 
logs_nginx:
	docker logs nginx
prune:
	docker builder prune --all
# Commands
#  nginx -t : checks nginx.conf file validity
check_nginx:
	docker exec -it nginx /bin/sh
check_wordpress:
	docker exec -it wordpress /bin/sh
check_mariadb:
	docker exec -it mariadb /bin/sh
eval_ssh_add:
	eval "$(ssh-agent -s)"
	ssh-add ~/.ssh/id_ed25519
cat_Dockerfiles:
	find . -type f -name Dockerfile 2>/dev/null | xargs cat	
loggol:
	~/bin/logger.sh > log.txt 2>/dev/null
git_last_commit:
	git reset --hard HEAD
reboot_mariadb:
	sudo rm -rf data/mariadb/*
	
