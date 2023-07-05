<?php

namespace Tests\Feature\Models;

use App\Models\Condition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function like_relation() :void
    {
        $this->seed();
        $item = Item::withCount('like')->find(1);
        $user_id = [1, 2];

        $this->assertInstanceOf(Collection::class, $item->likes);
        $this->assertFalse($item->like->isLike(null));
        $this->assertTrue($item->like->isLike($user_id[0]));
        $this->assertFalse($item->like->isLike($user_id[1]));
    }

    /** @test */
    function comment_relation() :void
    {
        $this->seed();
        $item = Item::withCount('comment')->find(1);
        $this->assertEquals(3, $item->comment_count);
    }

    /** @test */
    function sold_items_relation() :void
    {
        $this->seed();
        $item = Item::find(1);
        $this->assertInstanceOf(Collection::class, $item->sold_items);
    }

    /** @test */
    function categories_relation(): void
    {
        $this->seed();
        $item = Item::find(1);
        $this->assertInstanceOf(Collection::class, $item->sold_items);
    }

    /** @test */
    function condition_relation(): void
    {
        $this->seed();
        $item = Item::find(1);
        $this->assertInstanceOf(Condition::class, $item->condition);
    }
}
