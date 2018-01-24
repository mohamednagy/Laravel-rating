<?php

namespace Nagy\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Vote\Votable;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Nagy\LaravelRating\Traits\Like\Likeable;

class Post extends Model
{
    use Rateable, Votable, Likeable;

    protected $guarded = [];

    protected $table = 'users';
}
