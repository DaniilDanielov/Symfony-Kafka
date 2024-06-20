build: docker-build docker-init
rebuild: docker-down docker-prune docker-build docker-init
init: envs docker-init
du: docker-up cdu
dd: docker-down

	include .env


test:
	echo test

test2:
	(test -f .env || touch .env)
#&& sed -i '1s/^/\tinclude .env\n/' Makefile

cdu:
	 docker-compose exec ${APP_CONTAINER} composer du || true

docker-down:
	docker-compose down --remove-orphans || true

docker-up:
	docker-compose up -d

docker-build:
	docker-compose build

docker-init:
	make dd
	make du

restart: docker-down docker-up

secrets:
	(test -f .env || touch .env)
#&& sed -i '1s/^/include .env\n/' Makefile
	test -f ./.env.secrets || cp -n ./.env.vars.secrets ./.env.secrets

envs: secrets
	set -a && . ./.env.vars.dev  && . ./.env.secrets && set +a && USER_ID=$$(id -u) envsubst < ./.env.template 	> ./.env
	set -a && . ./.env && set +a && cp -f ./docker/pgsql/sql-template/100.sql ./docker/pgsql/sql-dist/100.sql && ep ./docker/pgsql/sql-dist/100.sql

docker-prune:
	docker-compose rm -fsv

php:
	docker-compose exec -it ${APP_CONTAINER}
