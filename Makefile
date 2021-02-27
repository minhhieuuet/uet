OS:=$(shell uname)

docker-start:
	docker-compose up -d

lint-php:
	vendor/bin/phpcs --standard=phpcs.xml --colors -n

docker-restart:
	docker-compose down
	make docker-start
	make docker-init-db-full
	make docker-link-storage

docker-connect:
	docker exec -it app1 bash

init-app:
	cp .env.example .env
	composer install
	npm install
	php artisan key:generate
	php artisan passport:keys --force
	php artisan migrate
	php artisan db:seed
	php artisan storage:link

docker-init:
	docker exec -it app1 make init-app

init-db-full:
	make autoload
	php artisan migrate:fresh
	php artisan db:seed
	php artisan passport:install --force
docker-init-db-full:
	docker exec -it app1 make init-db-full

docker-link-storage:
	docker exec -it app1 php artisan storage:link

init-db:
	make autoload
	php artisan migrate:fresh

start:
	php artisan serve

log-daily:
	tail -f "./storage/logs/laravel-$(shell date +"%Y-%m-%d").log"

log:
	tail -f storage/logs/laravel.log

test-js:
	npm test

test-php:
	vendor/bin/phpcs --standard=phpcs.xml && vendor/bin/phpmd app text phpmd.xml

build:
	docker exec -it app npm run dev

watch:
	docker exec -it app1 npm run watch-poll
dev:
	docker exec -it app npm run dev

autoload:
	composer dump-autoload

cache:
	php artisan cache:clear && php artisan view:clear && php artisan config:clear

docker-cache:
	docker exec app make cache

route:
	php artisan route:list

deploy:
	ssh $(u)@$(h) "mkdir -p $(dir)"
	rsync -avhzL --delete \
				--no-perms --no-owner --no-group \
				--exclude .git \
				--exclude vendor \
        --exclude .env \
				--exclude .idea \
				--exclude node_modules \
				. $(u)@$(h):$(dir)/


deploy-dev:
	make deploy u=root h=139.180.204.128 dir=/var/www/html/uet
	ssh root@sotatek.com "cd /var/www/html/uet && make cache"