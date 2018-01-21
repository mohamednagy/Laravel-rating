<?php

namespace Nagy\LaravelRatings\Tests;

use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\Tests\TestCase;
use Nagy\LaravelRating\Tests\Models\User;
use Nagy\LaravelRating\Tests\Models\Post;

class VotingTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function user_can_up_vote_votable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->upVote($post);
        
        $this->assertCount(1, $user->ratings);
        $this->assertTrue($user->getRatingValue($post) == 1);
    }

    /** @test */
    public function user_can_down_vote_votable_model()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);

        $user->downVote($post);
        
        $this->assertCount(1, $user->ratings);
        $this->assertTrue($user->getRatingValue($post) == 0);
    }

    /** @test */
    public function it_returns_total_up_voting_count()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->upVote($post);
        $user2->upVote($post);
        
        $this->assertTrue($post->upVotesCount() == 2);
    }

    /** @test */
    public function it_returns_total_down_voting_count()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->downVote($post);
        $user2->downVote($post);
        
        $this->assertTrue($post->downVotesCount() == 2);
    }

    /** @test */
    public function it_returns_total_votes_count()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->upVote($post);
        $user2->downVote($post);
        
        $this->assertTrue($post->votesCount() == 2);
    }
}