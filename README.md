<p align="center">
    <img src="https://image.ibb.co/eGKPgw/if_019_Star_2792947.png" width=32> &nbsp; &nbsp; &nbsp; &nbsp;
    <img src="https://image.ibb.co/nKBn1w/if_like_thumbs_up_hand_social_media_1169159.png" width=32>
    <img src="https://image.ibb.co/jq0rTb/if_thumbs_down_hand_social_media_dislike_1169174.png" width=32>
    &nbsp; &nbsp; &nbsp; &nbsp;
    <img src="https://image.ibb.co/hgco8b/if_chevron_up_173180.png" width=32>
    <img src="https://image.ibb.co/bANzEG/if_chevron_down_173177.png" width=32>
</p>

# Laravel-Ratings
Laravel package that allows you to **rate,  like & dislike or vote up & down** your models with a simple and clear way. <br>
*If you see this packge can help, Don't skimp on me with a star :)*

# Features

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

### Like & Dislike
include `CanLike` trait into your user model to apply like and dislike functionalties
```
use Nagy\LaravelRating\Traits\CanLike;

class User extends Model
{
    use CanLike;
```
include `Likeabke` trait to your model that will be likeabke
```
use Nagy\LaravelRating\Traits\Likeabke;

class User extends Model
{
    use Likeabke;
```
now you can like your model as the following:
```
// like
$user->like($postModel);

// dislike
$user->dislike($postModel);
```
get total likes count
```
$postModel->likesCount();
```
get total dislikes count
```
$postModel->dislikesCount();
```
get total likes and dislikes count
```
$postModel->likesDislikesCount();
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

