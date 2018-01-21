<?php

namespace Nagy\LaravelRating\Tests\Models;

use Nagy\LaravelRating\Traits\CanRate;
use Nagy\LaravelRating\Traits\Votable;
use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rateable;

class Post extends Model
{
    use Rateable, Votable;

    protected $guarded = [];

    protected $table = 'users';
}
