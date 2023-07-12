<?php

namespace Tests\Feature\Models;

use App\Models\Item;
use App\Models\Condition;
use App\Models\User;
use Database\Seeders\ConditionSeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\LikeSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function like_relation() :void
    {
        $this->seed([ItemSeeder::class, LikeSeeder::class]);
        $item = Item::withCount('like')->first();
        $user_id = [1, 2];

        $this->assertInstanceOf(Collection::class, $item->likes);
        $this->assertFalse($item->like->isLike(null));
        $this->assertTrue($item->like->isLike($user_id[0]));
        $this->assertFalse($item->like->isLike($user_id[1]));
    }

    /** @test */
    function comments_relation() 
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $this->assertInstanceOf(Collection::class, $item->comments);
    }

    /** @test */
    function sold_items_relation() :void
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $this->assertInstanceOf(Collection::class, $item->sold_items);
    }

    /** @test */
    function categories_relation(): void
    {
        $this->seed(ItemSeeder::class);
        $item = Item::first();
        $this->assertInstanceOf(Collection::class, $item->sold_items);
    }

    /** @test */
    function condition_relation(): void
    {
        $this->seed([ItemSeeder::class, ConditionSeeder::class]);
        $item = Item::first();
        $this->assertInstanceOf(Condition::class, $item->condition);
    }

    /** @test */
    function user_relation(): void 
    {
        $this->seed([ItemSeeder::class, UserSeeder::class]);
        $item = Item::first();
        $this->assertInstanceOf(User::class, $item->user);
    }
}
