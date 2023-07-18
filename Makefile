test:
	docker exec memorialbook-php-fpm-1 php artisan test

migrate:
	docker exec memorialbook-php-fpm-1 php artisan migrate

migrate-rollback:
	docker exec memorialbook-php-fpm-1 php artisan migrate:rollback

migrate-refresh:
	docker exec memorialbook-php-fpm-1 php artisan migrate:refresh --seed

docker-build:
	docker compose up -d --build

docker-up:
	docker compose up -d

docker-down:
	docker compose down

copy-project:
	cp -r /home/ivan/projects/memorialbook/ /mnt/c/OSPanel/domains/
