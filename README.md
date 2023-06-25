

![Escreenshot sistema](https://lh3.googleusercontent.com/drive-viewer/AFGJ81qfXVv7_hrI4QCUQcm6SU_kSTwPFGieHCqHuBpFAAEP9d1VxPSLq9CczZNfCcLgjvnmsCynLOGxfufn3AjZLdF8KbK2UQ=s1600)

# A simple exercise using Laravel 10

### WARNING: This repository is still under development.
### This readme file will be updated as the project progresses.

## WATCH THE EVIDENCE VIDEO:
- web ( [Click to watch](https://drive.google.com/file/d/14-LZbR99u2KhUTO_hbXF2D18UljmPzjh/view?usp=share_link) )

- API ( [Click to watch](https://drive.google.com/file/d/13eeoQkf5C8OYynC3qToPHgkwniPzbkVg/view?usp=share_link) )



## Minimum requirements
Laravel 10.x requires a minimum PHP version of 8.1.

Docker needs to be installed on the machine.

Node needs to be installed on the machine.

## Project installation

**Obtaining the source code**

Considering that git is already installed on your machine and using the terminal run the commands below:

`` $ git clone git@github.com:aroldosantos/task_training.git ``

`` $ cd task_training ``

You can also just download the zip and unzip it wherever you want.

In the ``task_training`` folder, run the commands below:

`` $ docker-compose up -d server ``

Wait to load the docker images needed for the project to work.

In the ``task_training`` folder, run the commands below:

`` $ docker-compose run --rm composer install ``

This will make Composer install the PHP dependencies

`` $ docker exec -it task_training-php-1 /bin/bash ``

The above command will enter the PHP prompt

Make a copy of the ``src/.env.example`` file and rename it to just ``src/.env``

Still at the PHP prompt, run the command:

`` $ php artisan key:generate ``

Open the ``.env`` and look for the entries:


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Replace entries with your settings

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

TABLE_CHECKBOX=false
```


``$ php artisan migrate --seed``

This command will both create tables in the database and populate these tables with fake data.

Open another terminal window, outside of docker, enter the folder ``task_training/src/`` and run the commands:


`` $ npm install``

`` $ npm run dev ``


## Accessing the administrative area

- URL: ``http://localhost:8000/login``
- User: ``test@example.com``
- Password: ``password``




# API test

Using an http client like Postman, use the resources and body as below:

- URL: ``http://localhost:8000/api/login``
- HTTP VERBS: POST.
- BODY: ``{
    "email": "test@example.com",
    "password": "password"
}``

- URL: ``http://localhost:8000/api/classrooms``
- HTTP VERBS: GET, POST, PATCH, DELETE.
- BODY: ``{
    "name": "Class Name Example 01",
    "capacity": 35
}``


- URL: ``http://localhost:8000/api/coffeebreaks``
- HTTP VERBS: GET, POST, PATCH, DELETE.
- BODY: ``{
    "name": "Coffeebreak Space Name Example 01",
    "capacity": 35 
}``

- URL: ``http://localhost:8000/api/customers``
- HTTP VERBS: GET, POST, PATCH, DELETE.
- BODY: ``{
    "name": "Customer",
    "surname": "Example 01",
    "cpf": "11111111111"
}``

- URL: ``http://localhost:8000/api/users``
- HTTP VERBS: GET, POST, PATCH, DELETE.
- BODY: ``{
    "name": "Test Example 2",
    "email": "test2@example.com",
    "password": "password",
    "password_confirmation": "password"
}``

- URL: ``http://localhost:8000/api/inscriptions``
- HTTP VERBS: GET, POST, PATCH, DELETE.
- BODY: ``{
    "classroom_id": "1",
    "coffeebreak_id": "1",
    "customer_id": "1",
    "status": "Confirmada"
}``
