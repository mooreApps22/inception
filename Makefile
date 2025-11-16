YAM = ./srcs/docker-compose.yml
ENV = ./.env

all:
	docker compose -f $(YAM) down
	docker compose -f $(YAM) up -d --build
up:
	docker compose -f $(YAM) up --build
upd:
	docker compose -f $(YAM) up -d --build
down:
	docker compose -f $(YAM) down
restart:
	docker compose -f $(YAM) down
	docker compose -f $(YAM) up -d --build
ps:
	docker compose -f $(YAM) ps 
logs:
	docker compose -f $(YAM) logs
prune:
	docker builder prune --all
