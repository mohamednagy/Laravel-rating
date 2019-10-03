<?php

namespace Nagy\LaravelRatings\Tests;

use Nagy\LaravelRating\Tests\TestCase;
use Nagy\LaravelRating\Tests\Models\User;
use Nagy\LaravelRating\Tests\Models\Post;

class LikeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function user_can_like_likable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->like($post);
        
        $this->assertCount(1, $user->likes);
    }
    
    /** @test */
    public function user_can_dislike_likable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->dislike($post);
        
        $this->assertCount(1, $user->likes);
    }

    /** @test */
    public function user_can_return_total_likes_count()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->like($post);
        $user2->like($post);
        
        $this->assertTrue($post->likesCount() == 2);
    }

    /** @test */
    public function it_can_return_liked_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->like($post);
        $user->dislike($post2);

        $this->assertEquals('test post', $user->liked()->first()->name);
    }

    /** @test */
    public function it_can_return_disliked_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->like($post);
        $user->dislike($post2);

        $this->assertEquals('test post2', $user->disliked()->first()->name);
    }

    /** @test */
    public function it_can_return_all_liked_disliked_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->like($post);
        $user->dislike($post2);

        $this->assertCount(2, $user->likedDisliked());
    }
}