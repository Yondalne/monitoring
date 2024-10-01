# Makefile for Docker Laravel Project

# Variables
DOCKER_COMPOSE = docker-compose
CONTAINER_API = api  # Assurez-vous que c'est le nom correct de votre conteneur API

# Commandes
.PHONY: update migrate seed start stop

update:
	$(DOCKER_COMPOSE) exec $(CONTAINER_API) composer update

migrate:
	$(DOCKER_COMPOSE) exec $(CONTAINER_API) php artisan migrate:fresh

seed:
	$(DOCKER_COMPOSE) exec $(CONTAINER_API) php artisan db:seed

start:
	$(DOCKER_COMPOSE) up -d

start:
	$(DOCKER_COMPOSE) up -d --build

stop:
	$(DOCKER_COMPOSE) down

# Commande pour exécuter toutes les tâches de configuration
setup: stop start update migrate seed

# Afficher l'aide
help:
	@echo "Usage:"
	@echo "  make [command]"
	@echo ""
	@echo "Available Commands:"
	@echo "  update   - Run 'composer update' in the API container"
	@echo "  migrate  - Run fresh migrations in the API container"
	@echo "  seed     - Seed the database in the API container"
	@echo "  start    - Start the Docker containers"
	@echo "  stop     - Stop the Docker containers"
	@echo "  setup    - Run start, update, migrate, and seed commands in sequence"
	@echo "  help     - Display this help message"