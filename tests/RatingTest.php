<?php

namespace Nagy\LaravelRatings\Tests;

use Illuminate\Database\Eloquent\Relations\Relation;
use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\Tests\TestCase;
use Nagy\LaravelRating\Tests\Models\User;
use Nagy\LaravelRating\Tests\Models\Post;

class RatingTest extends TestCase
{

    public function setUp(): void
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


    /** @test */
    public function it_can_return_rated_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->rate($post, 5);
        $user->rate($post2, 10);
        
        $this->assertCount(2, $user->rated());
    }

    /** @test */
    public function it_can_work_with_morph_maps()
    {
        Relation::$morphMap = [
            'post' => Post::class,
            'user' => User::class
        ];


        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->rate($post, 5);

        $this->assertCount(1, $user->rated());

    }
    
}
