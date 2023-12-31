<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Item;
use App\Models\User;
use Database\Seeders\ItemSeeder;
use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function comment_view_only_see_applicable_items(): void
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $user = User::factory()->create();
        Comment::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => 'comments testing'
        ]);

        $this->get(route('user.comment', ['item_id' => $item->id]))
        ->assertRedirectToRoute('user.login');

        $this->actingAs(User::factory()->create(), 'users')
        ->get(route('user.comment', ['item_id' => $item->id]))
        ->assertStatus(200)
        ->assertSee('comments testing');

        $this->actingAs(User::factory()->create(), 'users')
        ->get(route('user.comment', ['item_id' => $item->id + 1]))
        ->assertStatus(200)
        ->assertDontSee('comments testing');

    }

    /** @test */
    function create_new_comment(): void
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $user = User::factory()->create();

        $this->actingAs($user, 'users')->post(route('user.comment', [
            'item_id' => $item->id,
            'comment' => 'post method comment test'
        ]))->assertRedirectToRoute('user.comment', ['item_id' => $item->id]);

        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => 'post method comment test'
        ]);

        $this->get(route('user.comment', ['item_id' => $item->id]))
        ->assertSee('post method comment test');
    }

    /** @test */
    function an_user_can_delete(): void
    {
        $user = User::factory()->create();
        $comment = Comment::create([
            'user_id' => $user->id,
            'item_id' => 1,
            'comment' => 'test case'
        ]);

        $this->actingAs($user, 'users')->post(route('user.comment_delete', [
            'item_id' => 1,
            'comment_id' => $comment->id
        ]))->assertRedirectToRoute('user.comment', ['item_id' => 1]);

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id
        ]);
    }
}
