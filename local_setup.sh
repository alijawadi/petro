#!/bin/bash
echo "copy .env"
touch .env
cp -r .env.example .env

echo "docker build & up"
docker-compose up -d
echo "docker is up"


echo "Setup Laravel"
docker-compose exec php composer install
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate

echo "Setup Frontend"
docker-compose run --rm --service-ports npm install
docker-compose run --rm --service-ports npm run dev
