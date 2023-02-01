## About Management

<!--  -->

## Install application

-   copy project;
-   create .env file based on .env.example;

# get up docker container with following commands

    -   docker compose up --build
    -   docker compose exec management bash

# inside docker container run the following commands:

    -   npm install;
    -   composer install;
    -   npm run dev;
    -   php artisan migrate:fresh --seed

# Authentication

At this stage you can only create an user via DB;
For testing purposes, you can use the following credentials:

-   email: test@test.com
-   password: changeme123
