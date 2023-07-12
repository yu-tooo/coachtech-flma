<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Item;
use Database\Seeders\ItemSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function owner_item_home_view() 
    {
        $this->get(route('owner.items'))->assertRedirectToRoute('owner.login');

        $this->login('owners');
        $this->get(route('owner.items'))->assertStatus(200)
        ->assertSee('商品一覧');
    }

    /** @test */
    function owner_item_detail_view()
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $this->get(route('owner.item_detail', ['item_id' => $item->id]))->assertRedirectToRoute('owner.login');
        $this->login('owners');
    }
}
