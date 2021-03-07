<?php

namespace Nagy\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Like\CanLike;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Nagy\LaravelRating\Traits\Vote\CanVote;

class User extends Model
{
    use CanRate;
    use CanVote;
    use CanLike;

    protected $guarded = [];

    protected $table = 'users';
}
