<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function owner_can_delete_comments(): void
    {
        $comment = Comment::create([
            'item_id' => 1,
            'user_id' => 1,
            'comment' => 'test case'
        ]);
        $this->login('owners');
        $this->from(route('owner.item_detail', ['item_id' => 1]))->post(route('owner.comment_delete', [
            'comment_id' => 1
        ]))->assertRedirectToRoute('owner.item_detail', ['item_id' => 1]);

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id
        ]);
    }
}
