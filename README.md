# Video-platform

A simple video hosting platform.

## Screenshot

![Video platform preview](https://pjastrzebski.pl/assets/img/video-thumb.jpg)

## Demo

https://haker.edu.pl/wideo/

## Getting Started

### Installing

Please check the official Laravel Framework installation guide for server requirements before you start.  [Official Documentation](https://laravel.com/docs/8.x)

Clone the repository
```
git clone https://github.com/Patrickjusz/video-platform.git
```
Install all the dependencies using composer
```
composer install
```

Install all the dependencies using composer and npm
```
npm install && npm run dev
```

Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```

Generate a new application key
```
php artisan key:generate
```

Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```

To create the symbolic link, you may use the storage:link Artisan command:
```
php artisan storage:link
```

Generate a new API key
```
php artisan apikey:generate dashboard
php artisan apikey:activate dashboard
```

Start the local development server
```
php artisan serve
```

You can now access the server at http://localhost:8000


### Database seeding
```
php artisan db:seed
```

## License

This project is licensed under the [NAME HERE] License - see the LICENSE.md file for details
