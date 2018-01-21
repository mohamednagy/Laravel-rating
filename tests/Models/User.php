<?php

namespace Nagy\LaravelRating\Tests\Models;

use Nagy\LaravelRating\Traits\CanRate;
use Nagy\LaravelRating\Traits\CanVote;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use CanRate, CanVote;

    protected $guarded = [];

    protected $table = 'users';
}
