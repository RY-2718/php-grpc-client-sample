build:
	docker-compose build

test:
	docker-compose run test
	docker-compose down

sh:
	docker-compose run test sh