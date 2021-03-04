start:
	docker-compose up -d

stop:
	docker-compose stop $(docker-compose ps -q -a)

remove:
	docker-compose rm $(docker-compose ps -q -a)
