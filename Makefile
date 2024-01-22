up: 
	docker-compose up -d
start: 
	docker-compose start
stop: 
	docker-compose stop
restart: 
	docker-compose restart
bash:
	docker exec -it laravel-redis-docker-laravel.test-1 bash
sh:
	docker exec -it laravel-redis-docker-laravel.test-1 sh