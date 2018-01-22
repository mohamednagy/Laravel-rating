# Laravel-Ratings
Laravel package that allows you to **rate/vote** your models with a simple and clear way. <br>
*If you see this packge can help, Don't skimp on me with a star :)*

# Intor

### Rating
include `CanRate` trait into your user model to apply rating functionalties
```
use Nagy\LaravelRating\Traits\CanRate;

class User extends Model
{
    use CanRate;
```
include `Rateable` trait to your model that will be rateable
```
use Nagy\LaravelRating\Traits\Rateable;

class User extends Model
{
    use Rateable;
```

now you can rate your models as the following:
```
$user->rate($postModel, 5);
```
get the average ratings of a model
```
$post->ratingsAvg();
```
get the total count of ratings of a model
```
$post->ratingsCount();
```

### Voting
include `CanVote` trait into your user model to apply rating functionalties
```
use Nagy\LaravelRating\Traits\CanVote;

class User extends Model
{
    use CanVote;
```
include `Votable` trait to your model that will be votable
```
use Nagy\LaravelRating\Traits\Votable;

class User extends Model
{
    use Votable;
```
now you can vote your model as the following:
```
// up vote or +1  your model
$user->upVote($postModel);

// down vote or -1 your model
$user->downVote($postModel);
```
get total votes count
```
$postModel->votesCount();
```
get total up votes count
```
$postModel->upVotesCount();
```
get total down votes count
```
$postModel->downVotesCount();
```
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
    ],

    'aliases' => [
        "LaravelRating" => \Nagy\LaravelRating\LaravelRatingFacade::class,
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

