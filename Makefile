start:
	docker-compose up -d
dev:
	docker-compose up
run:
	docker-compose ps
stop:
	docker-compose stop $(docker-compose ps -q -a)
remove:
	docker-compose rm -f $(docker-compose ps -q -a)
php:
	docker exec -ti php-challenge sh
db:
	docker exec -ti database-challenge sh
server:
	docker exec -ti web-server-challenge sh