# :cat: Cat Tube Auth MS

#### Cat Tube Auth is a micro service authentication container for the Cat Tube ecosystem. Starting from generating your Authentication token here and begin to utilize services.

## :wrench: Installation
Cat Tube Auth, as all cat tube MS is using docker for development. To run you must get docker up and going and create the containers by running:

#### Get containers running:
```bash
$ docker-compose up
```

#### Install project dependencies:
Step 1: Find the container name:
```bash
$ docker ps
```

Step 2: Connect into container's bash:
```bash
$ docker exec -it <container-name> bash
```

Step 3: Run composer install to get dependencies ready:
```bash
$ composer install
```

Now run the migrations to get Database ready (don't forget to configure .env with proper database connection):
```bash
$ php artisan migrate
```

#### Install Passport:
This will create passport clients, needed for authentication. Once client id and secret are created they won' t show again, but you can consult them in database if you have this access. [Also you can create an specific client to interact with the application](https://laravel.com/docs/9.x/passport#clients-json-api) 
```bash
$ php artisan passport:install
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
