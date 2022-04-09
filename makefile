docker-up:
	- docker-compose up -d

docker-down:
	- docker-compose down

laravel:
	- docker-compose exec laravel bash

mysql:
	- docker-compose exec mysql bash -c "mysql -u laravel -ppassword"
