# SBIT - Backend
Laravel based small business inventory tracking using Docker Environment

## Prepare for development environment

1. [Docker installed](https://docs.docker.com/docker-for-mac/install/)
2. Clone repo `git@github.com:unit-6/101-backend.git`
3. Check current exposed ports at docker-compose.yml, make sure all these ports can be used at localhost:- 
  - **nginx** - `:8080`
  - **mysql** - `:3306`
  - **php** - `:9000`
4. Navigate in terminal to the cloned directory and run `docker-compose up -d`
5. Run `docker ps` to check current container running
  - ![docker-result](/docker-result.png)
6. Project URL:-
  - Laravel - `http://localhost:8080/`
  - phpmyadmin - `http://localhost:8081/`

## Docker Commands

- `docker-compose up -d --build site`
- `docker-compose up -d`
- `docker-compose down`
- `docker images`
- `docker images -a`
- `docker ps`
- `docker ps -a`
- `docker system prune`
- `docker system prune -a`

## Laravel Project

Laravel project will be started at src folder. Three additional containers are included that handle Composer, NPM, and Artisan commands without having to have these platforms installed on your local computer. Use the following command examples from your project root:-

- `docker-compose run --rm composer update`
- `docker-compose run --rm npm run dev`
- `docker-compose run --rm artisan migrate` 