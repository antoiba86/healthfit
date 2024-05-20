PHP with DDD in Symfony

## Description

**PHP** project based on Symfony skeleton with some components and tools to build a solid application following **clean architecture**. The environment is built with **Docker** which contains the components to run the application without external dependencies.

## Requirements

The project only requires to have installed **Docker** and **Docker Compose** in order to start working on it.

## Set Up

1. Create a copy of `.env.example` as `.env` and assign values to `APP_SECRET` and `MYSQL_ROOT_PASSWORD`
    ```shell
    cp .env.example .env
    ```

2. Build and start docker containers
    ```shell
    docker compose build --no-cache --pull && docker compose up -d
    ```

3. Install composer dependencies
    ```shell
    docker exec php sh -c 'composer install'
    ```

4. Execute all DB migrations.
    ```shell
    docker exec php sh -c 'php bin/console doctrine:migrations:migrate -n'
    ```

5. (Optional) Import seeder.
    ```shell
    docker exec -i mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" storage' < seeder/database_seeder_data.sql
    ```

6. Use the desired service.
    - Adminer. http://localhost:8080/?server=mysql&username=root&db=storage