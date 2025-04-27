# Welcome to Filament Laravel Project :rocket:

This app uses:
- **Laravel** -- PHP framework
- **Filament** -- Admin panel builder
- **MySQL** -- Database
- **Docker** -- Containerization

## Step-by-step build my project

1. Install Laravel and Filament
```sh
composer create-project laravel/laravel toko-server
cd toko-server
composer require filament/filament
```

2. Configure your `.env` file for database connection
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=toko-server
DB_USERNAME=root
DB_PASSWORD=root
```

3. Run migrations to set up the database
```sh
php artisan migrate
```

4. Install Filament Admin Panel
```sh
php artisan make:filament-user
```
Follow the prompts to create an admin user.

5. Create Filament Resources
```sh
php artisan make:filament-resource ResourceName
```
Customize the generated resource files in `app/Filament/Resources`.

5. Set up API Service Filament Plugin

```sh
Refer to the [API Service Plugin Documentation](https://filamentphp.com/plugins/rupadana-api-service) for detailed instructions.
```

6. Set up Docker for Laravel and MySQL
```sh
docker-compose up --build --detach
```

## API Documentation

1. Create and read item

`POST /api/admin/items`

`GET /api/admin/items`

2. Create and read category

`POST /api/admin/categories`

`GET /api/admin/categories`

3. Create and read supplier

`POST /api/admin/suppliers`

`GET /api/admin/suppliers`

4. Show list of items with stocks below a certain number

`GET /api/admin/items?filter[quantity_below]={number}`

5. Show reports of items with a certain category

`GET /api/admin/items?filter[category_id]={id}`



## Additional Notes

- Customize Filament resources to match your project requirements.
- Use Laravel's built-in features for advanced functionality.
- Refer to the [Filament Documentation](https://filamentphp.com/docs) for more details.
