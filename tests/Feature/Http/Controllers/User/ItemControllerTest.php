<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Item;
use App\Models\User;
use Database\Seeders\ItemSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    
    function index_view(): void
    {
        $this->seed([ItemSeeder::class]);
        $this->get(route('user.home'))->assertStatus(200)->assertSee('item12');

        $this->get(route('user.home', [
            'name' => 'ネック'
        ]))->assertStatus(200)->assertSee('item7')->assertDontSee('item12');
    }

    /** @test */
    function index_cannot_see_own_items(): void
    {
        $this->seed([ItemSeeder::class, UserSeeder::class]);
        $user = User::find(1);

        $this->actingAs($user, 'users')->get(route('user.home'))
        ->assertSee('item1')
        ->assertDontSee('item5');
    }

    /** @test */
    function item_view(): void
    {
        $this->seed();
        $item1 = Item::withCount('like')->withCount('comment')->find(1);

        $this->get(route('user.item', ['item_id' => $item1]))
        ->assertStatus(200)       
        ->assertSeeText([
            $item1->name, 
            number_format($item1->price), 
            $item1->like_count,
            $item1->comment_count,
            $item1->condition->getCondition()
        ])->assertSeeInOrder(['装着', '運動']);
    }    
}
