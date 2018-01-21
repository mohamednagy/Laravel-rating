# Laravel-Ratings
Laravel package that allows you to rate your models with a simple ways

# Install

```
$ compoer require nagy/laravel-rating
```

in your config/app.php
```
in your config/app.php add

    'providers' => [
        ...
        Nagy\LaravelRating\LaravelRatingServiceProvider::class
    ]
```
> You don't need this step in laravel5.5 `package:discover`  will do the job :)

publish the migrations
```
$ php artisan vendor:publish --tag=laravelRatings
```

run the migrations
```
$ php artisan migrate
```

