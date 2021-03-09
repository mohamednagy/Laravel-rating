<p align="center">
    <img src="https://image.ibb.co/eGKPgw/if_019_Star_2792947.png" width=32> &nbsp; &nbsp; &nbsp; &nbsp;
    <img src="./media/like-dislike.png" width=60>
    &nbsp; &nbsp; &nbsp; &nbsp;
    <img src="https://image.ibb.co/hgco8b/if_chevron_up_173180.png" width=32>
    <img src="https://image.ibb.co/bANzEG/if_chevron_down_173177.png" width=32>
</p>

# New Maintainer
This package now maintined by [Ahmed Nagi](https://twitter.com/nagiworks)

# Laravel-Ratings
Laravel package that allows you to **rate,  like & dislike or vote up & down** your models with a simple and clear way. <br>
*If you see this packge can help, Don't skimp on me with a star :)*

* [Install](https://github.com/mohamednagy/Laravel-rating#install)
* <img src="https://image.ibb.co/eGKPgw/if_019_Star_2792947.png" width=20> [Rating](https://github.com/mohamednagy/Laravel-rating#rating)
* <img src="./media/like-dislike.png" width=25> [Like & Dislike](https://github.com/mohamednagy/Laravel-rating#like--dislike)
* <img src="https://image.ibb.co/hgco8b/if_chevron_up_173180.png" width=20> [Voting](https://github.com/mohamednagy/Laravel-rating#voting)


## Rating
include `CanRate` trait into your user model to apply rating functions
```php
use Nagy\LaravelRating\Traits\Rate\CanRate;

class User extends Model
{
    use CanRate;
```
include `Rateable` trait to your model that will be rateable
```php
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Post extends Model
{
    use Rateable;
```

now you can rate your models as the following:
```php
$user->rate($postModel, 5);
```
also you can unrate your models as the following:
```php
$user->unrate($postModel);

// alternatively
$user->rate($postModel, -1);
// or
$user->rate($postModel, false);
// or
$user->rate($postModel, null);
```

get the average ratings of a model
```php
$post->ratingsAvg();
```
get the total count of ratings of a model
```php
$post->ratingsCount();
```

get the rated models by a user
```php
$user->rated(); // returns a collection of rated models
```

## Voting
include `CanVote` trait into your user model to apply rating functionalties
```php
use Nagy\LaravelRating\Traits\Vote\CanVote;

class User extends Model
{
    use CanVote;
```
include `Votable` trait to your model that will be votable
```php
use Nagy\LaravelRating\Traits\Vote\Votable;

class Post extends Model
{
    use Votable;
```
now you can vote your model as the following:
```php
// up vote or +1  your model
$user->upVote($postModel);

// down vote or -1 your model
$user->downVote($postModel);
```
get total votes count
```php
$postModel->votesCount();
```
get total up votes count
```php
$postModel->upVotesCount();
```
get total down votes count
```php
$postModel->downVotesCount();
```

get the up voted models by a user
```php
$user->upVoted(); // returns a collection of up voted models
```

get the down voted models by a user
```php
$user->downVoted(); // returns a collection of down voted models
```

get the total voted models by a user
```php
$user->voted(); // returns a collection of total voted models;
```

## Like & Dislike
include `CanLike` trait into your user model to apply like and dislike functionalties
```php
use Nagy\LaravelRating\Traits\Like\CanLike;

class User extends Model
{
    use CanLike;
```
include `Likeable` trait to your model that will be likeable
```php
use Nagy\LaravelRating\Traits\Like\Likeable;

class Post extends Model
{
    use Likeable;
```
now you can like your model as the following:
```php
// like
$user->like($postModel);

// dislike
$user->dislike($postModel);
```
get total likes count
```php
$postModel->likesCount();
```
get total dislikes count
```php
$postModel->dislikesCount();
```
get total likes and dislikes count
```php
$postModel->likesDislikesCount();
```
get the liked models by a user
```php
$user->liked(); // return a collection of liked models;
```
get the disliked models by a user
```php
$user->disliked(); // return a collection of disliked models;
```
get the total liked and disliked models by a user
```php
$user->likedDisliked(); // return a collection of liked and disliked models;
```

# Install

for laravel 8.* , 7.* , 6.*

```bash
composer require nagy/laravel-rating
```

for laravel 5.*

```bash
composer require nagy/laravel-rating:^1.2
```

in your config/app.php

```php
    'providers' => [
        ...
        Nagy\LaravelRating\LaravelRatingServiceProvider::class
    ],

    'aliases' => [
        ...
        "LaravelRating" => \Nagy\LaravelRating\LaravelRatingFacade::class,
    ]
```

> You don't need this step in laravel5.5 `package:discover`  will do the job :)

publish the migrations

```bash
php artisan vendor:publish --tag=laravelRatings
```

run the migrations

```bash
php artisan migrate
```
