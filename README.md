# Insider League
#### Install with [Docker](https://www.docker.com/products/docker-desktop) & [Laravel Sail](https://laravel.com/docs/8.x/sail):
1. Install this code on your local system:

    ```
    git clone https://github.com/masabni/notes-app.git
    ```

2. Change directory into the local clone of the repository:

    ```
    cd notes-app
    ```

3. Create a `.env` file by copying the sample

    ```
    cp .env.example .env
    ```

   Or for Windows:

    ```
    copy .env.example .env
    ```

   Now edit the *.env* file and change the DB variables, please note that you need to set the DB_HOST to mysql if you're using sail

4. Install the dependencies with composer

    ```
    composer install
    ```

4. Start Laravel Sail. The first time you run the Sail up command, Sail's application containers will be built on your machine. This could take several minutes. Don't worry, subsequent attempts to start Sail will be much faster (make sure that the ports 80 & 3306 are not used, otherwise you should change APP_PORT & FORWARD_DB_PORT in .env file respectively):

    ```
    ./vendor/bin/sail up -d
    ```

5. Generate app key:

    ```
    ./vendor/bin/sail artisan key:generate
    ```

6. Run migrations & seeders:

    ```
    ./vendor/bin/sail artisan migrate --seed
    ```

Now you can visit the app on [http://localhost](http://localhost) or localhost:{APP_PORT}.

#### Install With Composer (PHP ^7.3|^8.0):
1. Install this code on your local system:

    ```
    git clone https://github.com/masabni/notes-app.git
    ```

2. Change directory into the local clone of the repository

    ```
    cd notes-app
    ```

3. Installs the project dependencies

    ```
    composer install
    ```

4. Create a `.env` file by copying the sample

    ```
    cp .env.example .env
    ```

   Or for Windows:

    ```
    copy .env.example .env
    ```

   Now edit the *.env* file and change the DB variables

5. Generate app key:

    ```
    php artisan key:generate
    ```

6. Run migrations & seeders:

    ```
    php artisan migrate --seed
    ```

8. Start project

    ```
    php artisan serve
    ```

This will run the app on [http://127.0.0.1:8000](http://127.0.0.1:8000)
