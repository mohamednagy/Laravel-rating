<?php

namespace Nagy\LaravelRatings\Tests;

use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\Tests\TestCase;
use Nagy\LaravelRating\Tests\Models\User;
use Nagy\LaravelRating\Tests\Models\Post;

class RatingTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function user_can_rate_rateable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);
        
        $this->assertCount(1, $user->ratings);
    }

    /** @test */
    public function it_can_return_rating_value_for_user_for_rateable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);
        
        $this->assertTrue($user->getRatingValue($post) == 5);
    }

    /** @test */
    public function it_can_update_user_rating_if_already_rated()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);
        $this->assertTrue($user->getRatingValue($post) == 5);

        $user->rate($post, 10);
        $this->assertTrue($user->getRatingValue($post) == 10);
    }

    /** @test */
    public function it_can_return_avg_for_rateable_model()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);
        $user2->rate($post, 10);
        
        $this->assertTrue($post->ratingsAvg() == 7.5);
    }

    /** @test */
    public function it_can_return_count_for_rateable_model()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);
        $user2->rate($post, 10);
        
        $this->assertTrue($post->ratingsCount() == 2);
    }
    
}