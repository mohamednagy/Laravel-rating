<?php

namespace Nagy\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Nagy\LaravelRating\Traits\Vote\CanVote;
use Nagy\LaravelRating\Traits\Like\CanLike;

class User extends Model
{
    use CanRate, CanVote, CanLike;

    protected $guarded = [];

    protected $table = 'users';
}
