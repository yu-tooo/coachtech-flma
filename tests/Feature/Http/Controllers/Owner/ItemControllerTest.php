<?php

namespace Tests\Feature\Http\Controllers\Owner;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function owner_item_home_view() 
    {
        $this->get(route('owner.item'))->assertRedirectToRoute('owner.login');

        $this->login('owners');
        $this->get(route('owner.item'))->assertStatus(200)
        ->assertSee('商品一覧');
    }
}
