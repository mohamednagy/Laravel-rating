<?php

namespace Nagy\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Like\Likeable;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Nagy\LaravelRating\Traits\Vote\Votable;

class Post extends Model
{
    use Rateable;
    use Votable;
    use Likeable;

    protected $guarded = [];

    protected $table = 'users';
}
