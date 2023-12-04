
# Laravel Livewire Crud

this is the laravel cruc using Livewire


## Run Locally

Clone the project

```bash
  git clone https://github.com/kiranbishwo/livewire_crud.git
```

Go to the project directory

```bash
  cd livewire_crud
```

Install dependencies

```bash
  composer install
  npm install
```
Copy environment file

```bash
  cp .env.example .env
```

Setup database environment in .env file

```bash
  DB_CONNECTION=pgsql (or mysql)
  DB_HOST=127.0.0.1
  DB_PORT=5432
  DB_DATABASE=database_name
  DB_USERNAME=user_name
  DB_PASSWORD=password
```
Migrate database

```bash
  php artisan migrate
```
Run project

```bash
  php artisan serve
```

