<?php

namespace Nagy\LaravelRatings\Tests;

use Nagy\LaravelRating\Models\Rating;
use Nagy\LaravelRating\Tests\TestCase;
use Nagy\LaravelRating\Tests\Models\User;
use Nagy\LaravelRating\Tests\Models\Post;

class VotingTest extends TestCase
{
    public function setUp(): void
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
        
        $this->assertTrue($post->totalVotesCount() == 2);
    }

    /** @test */
    public function it_returns_votes_diff()
    {
        $user = User::create(['name' => 'test']);
        $user2 = User::create(['name' => 'test2']);
        $post = Post::create(['name' => 'test post']);

        $user->upVote($post);
        $user2->downVote($post);
        
        $this->assertTrue($post->votesDiff() == 0);
    }

    /** @test */
    public function it_can_return_up_voted_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->upVote($post);
        $user->downVote($post2);

        $this->assertEquals('test post', $user->upVoted()->first()->name);
    }

    /** @test */
    public function it_can_return_disliked_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->upVote($post);
        $user->downVote($post2);

        $this->assertEquals('test post2', $user->downVoted()->first()->name);
    }

    /** @test */
    public function it_can_return_all_voted_items_for_a_user()
    {
        $user = User::create(['name' => 'test']);
        $post = Post::create(['name' => 'test post']);
        $post2 = Post::create(['name' => 'test post2']);

        $user->upVote($post);
        $user->downVote($post2);

        $this->assertCount(2, $user->voted());
    }
}