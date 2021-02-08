# SBIT - Backend
Laravel based small business inventory tracking using Docker Environment

## Prepare for development environment

1. [Docker installed](https://docs.docker.com/docker-for-mac/install/)
2. Clone repo `git@github.com:unit-6/101-backend.git`
3. Copy `docker-compose.yml.example` and rename to `docker-compose.yml.example`
4. Check current exposed ports at docker-compose.yml, make sure all these ports can be used at localhost:- 
  - **nginx** - `:8080`
  - **mysql** - `:3306`
  - **php** - `:9000`
5. Navigate in terminal to the cloned directory and run `docker-compose up -d`
6. Run `docker ps` to check current container running:-
  
  ![docker-result](/docker-result.png)
7. Project URL:-
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

- `docker-compose run --rm composer install`
- `docker-compose run --rm composer update`
- `docker-compose run --rm artisan key:generate`
- `docker-compose run --rm artisan migrate`
- `docker-compose run --rm artisan migrate:fresh --seed`

## Contribute to project

1. [Create new issue](https://github.com/unit-6/101-backend/issues/new)
2. Assignees: `tag youself`
3. Labels:-

- `to do` - Task not yet do (compulsory)
- `doing` - Task start (compulsory)
- `enhancement` - New feature (optional)
- `bug` - Need fixing (optional)
- `documentation` - improve documents (optional)

4. Create new branch from `Master` branch
5. [Create pull request](https://github.com/unit-6/101-backend/pulls)
6. Reviewer: [@miesaf](https://github.com/miesaf)
