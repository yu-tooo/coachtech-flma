<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\User;
use Database\Seeders\CommentSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function user_relation(): void
    {   
        $this->seed([CommentSeeder::class, UserSeeder::class]);
        $comment = Comment::first();
        $this->assertInstanceOf(User::class, $comment->user);
    }
}
