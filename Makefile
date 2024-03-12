test:
	docker compose exec php-fpm php artisan test

migrate:
	docker compose exec php-fpm php artisan migrate

seed:
	docker compose exec php-fpm php artisan db:seed

migrate-rollback:
	docker compose exec php-fpm php artisan migrate:rollback

migrate-refresh:
	docker compose exec php-fpm php artisan migrate:refresh --seed

composer-install-dev:
	docker compose exec php-fpm composer install --ignore-platform-req=ext-http

composer-install-prod:
	docker compose exec php-fpm composer install --ignore-platform-req=ext-http --no-dev --optimize-autoloader

composer-update:
	docker compose exec php-fpm composer install --ignore-platform-req=ext-http

docker-build:
	docker compose up -d --build

docker-up:
	docker compose up -d

docker-down:
	docker compose down
