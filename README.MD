Popcode

List images and containers
```
docker images
docker ps -qa
docker rmi $(docker images -f "dangling=true" -q)
docker rmi IMAGE_ID
```

stop all
```
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
```

Build imagem
```
docker build -t lcsbaroni/popcode:1.0 .
```

Run command
```
docker run lcsbaroni/popcode:1.0 php -i | grep mysql
docker run -v site:/app lcsbaroni/popcode:1.0 composer install
```

Docker compose
```
docker-compose up -d
docker-compose down
docker-compose up
```

Acessar container
```
docker exec -it popcode-docker_app_1 ash
php artisan migrate
ps aux | grep php
ps aux | grep newrelic
```

Logs
```
docker-compose logs -f app
```

Push
```
docker login
docker push lcsbaroni/popcode:1.0
```
