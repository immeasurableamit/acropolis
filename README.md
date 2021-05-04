# acropolis (Assignment)


## Installation

Please check the official Laravel installation [guide](https://laravel.com/docs/6.x/installation) for server requirements before you start.

For a quick **TL;DR**, you can skip below.

#### Clone the repository
```bash
git clone git@gitlab.com:ui-clients/saindex.git <projectname>
```

#### Switch to the repo folder
```bash
cd <projectname>
```

#### Install all the dependencies using composer
```bash
composer install
```

#### Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```

#### Generate a new application key
```bash
php artisan key:generate
```

#### Run the DB migration (Make sure DB connection is setup in ``.env`` prior to running migration)
```bash
php artisan migrate
```

#### Local Development Server
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command.
```bash
php artisan serve
```

You can now access the server at [localhost](http://127.0.0.1:8000).

**TL;DR**
```bash
git clone git@gitlab.com:ui-clients/taps.git <projectname>

cd <projectname>

composer install

cp .env.example .env

php artisan key:generate
```

Make sure you set the correct database connection information before running the migration.
```bash
php artisan migrate
php artisan serve
```

## Database Seeding

**Populate the database with seed data & relationships.**

To verify the *Administrator* password check the ``UserSeeder`` file.

#### Run the database seeder
```bash
php artisan db:seed
```

## Create storage symbolic link
By default, the public disk uses the local driver and stores the files in `storage/app/public`.

To make them accessible from the web, create a symbolic link from `public/storage` to `storage/app/public`.
```bash
php artisan storage:link
```

## Node.js packages
You will need `node` and `npm` installed globally on your machine.

#### Install the dependencies
```bash
npm i
```

#### Compile the assets
```bash
npm run dev
```

----------
