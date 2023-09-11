PHP_SERVICE := php
 
build:
	@docker-compose build
	@docker-compose up -d

database-load:
	@docker-compose exec $(PHP_SERVICE) bin/console --no-interaction make:migration
	@docker-compose exec $(PHP_SERVICE) bin/console --no-interaction doctrine:migrations:migrate
	@docker-compose exec $(PHP_SERVICE) bin/console --no-interaction doctrine:fixtures:load

all:
	@make -s build
	@make -s database-load