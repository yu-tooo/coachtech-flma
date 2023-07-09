<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Item;
use App\Models\Like;
use App\Models\User;
use Database\Seeders\ItemSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function create_like() 
    {
        $this->seed([ItemSeeder::class]);
        $item = Item::find(10);
        $this->post(route('user.like', ['item_id' => $item->id]))
        ->assertRedirectToRoute('user.login');

        $user = User::factory()->create(['id' => 5]);
        $this->actingAs($user, 'users')->post(route('user.like', [
            'item_id' => $item->id
        ]))->assertRedirect();

        $this->assertDatabaseHas('likes', [
            'user_id' => 5,
            'item_id' => 10
        ]);
    }

    /** @test */
    function destroy_like()
    {
        $this->seed([ItemSeeder::class]);
        $item = Item::find(10);
        $this->post(route('user.unlike', ['item_id' => $item->id]))
        ->assertRedirectToRoute('user.login');
        
        Like::create(['user_id' => 5, 'item_id' => 10]);
        $this->assertDatabaseHas('likes', [
            'user_id' => 5,
            'item_id' => 10
        ]);

        $user = User::factory()->create(['id' => 5]);
        $this->actingAs($user, 'users')->post(route('user.unlike', [
            'item_id' => $item->id
        ]))->assertRedirect();

        $this->assertDatabaseMissing('likes', [
            'user_id' => 5,
            'item_id' => 10
        ]);
    }
}
