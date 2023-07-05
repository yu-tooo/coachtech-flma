<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function index_view(): void
    {
        $this->seed();
        $this->get(route('user.home'))
        ->assertStatus(200)
        ->assertSee('items/item12.jpg');
    }

    /** @test */
    function item_view() {
        $this->seed();

        $item1 = Item::find(1);
        $item2 = Item::find(2);

        $this->get(route('user.item', ['item_id' => $item1]))
        ->assertStatus(200)
        ->assertSee($item1->name)
        ->assertSee('￥5,400(値段)')
        ->assertSee(1)
        ->assertSee(3)
        ->assertSee('運動');

        $this->get(route('user.item', ['item_id' => $item2]))
        ->assertStatus(200)
        ->assertSee($item2->name)
        ->assertSee('￥1,200(値段)')
        ->assertSee('学生');
    }
    
}
