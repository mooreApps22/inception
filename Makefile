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
restart:
	docker compose -f $(YAM) down
	docker compose $(ENV) -f $(YAM) up -d --build
ps:
	docker compose -f $(YAM) ps 
logs:
	docker compose -f $(YAM) logs
prune:
	docker builder prune --all
# Commands
#  nginx -t : checks nginx.conf file validity
check_nginx:
	docker exec -it nginx /bin/sh
check_wordpress:
	docker exec -it wordpress /bin/sh
eval_ssh_add:
	eval "$(ssh-agent -s)"
	ssh-add ~/.ssh/id_ed25519
