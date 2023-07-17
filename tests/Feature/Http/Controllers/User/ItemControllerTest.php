<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Item;
use App\Models\User;
use Database\Seeders\CategoryItemSeeder;
use Database\Seeders\ConditionSeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    
    function index_view(): void
    {
        $this->seed(ItemSeeder::class);
        $this->get(route('user.home'))->assertStatus(200)->assertSee('item6');

        $this->get(route('user.home', [
            'name' => 'ペン'
        ]))->assertStatus(200)->assertSee('item2')->assertDontSee('item6');
    }

    /** @test */
    function index_cannot_see_own_items(): void
    {
        $this->seed([ItemSeeder::class, UserSeeder::class]);
        $user = User::find(1);

        $this->actingAs($user, 'users')->get(route('user.home'))
        ->assertSee('item1')
        ->assertDontSee('item2');
    }

    /** @test */
    function item_view(): void
    {
        $this->seed([ItemSeeder::class, ConditionSeeder::class]);
        $item1 = Item::withCount('like')->withCount('comment')->find(1);
        $this->get(route('user.item', ['item_id' => $item1->id]))
        ->assertStatus(200)       
        ->assertSeeText([
            $item1->name, 
            number_format($item1->price), 
            $item1->like_count,
            $item1->comment_count,
            $item1->condition->getCondition()
        ]);
    }

    /** @test */
    function sell_view(): void 
    {
        $this->seed(ProfileSeeder::class);
        $withProfileUser = User::factory()->create(['id' => 1]);
        $withoutProfileUser = User::factory()->create(['id' => 6]);

        $this->get(route('user.sell'))->assertRedirectToRoute('user.login');

        $this->actingAs($withProfileUser, 'users')->get(route('user.sell'))
        ->assertStatus(200)->assertSee('商品の出品');

        $this->actingAs($withoutProfileUser, 'users')->get(route('user.sell'))
        ->assertRedirectToRoute('user.profile');
    }

    /** @test */
    function sell_validate(): void
    {
        $this->post(route('user.sell', []))->assertRedirectToRoute('user.login');

        $this->login('users');
        $this->post(route('user.sell', [
            'categories' => [""]
        ]))->assertInvalid([
            'productName' => "商品名は必ず入力してください",
            'price' => "販売価格は必ず入力してください",
            'description' => "商品の説明は必ず入力してください",
            'image' => "画像は必ず入力してください",
            'categories.0' => 'カテゴリー1は必ず入力してください',
            'condition' => "商品の状態は必ず入力してください"
        ]);
        
        $this->post(route('user.sell', [
            'price' => "10,000",
            'description' => "20文字以下",
            'url' => 'url形式になってない'
        ]))->assertInvalid([
            'price' => '販売価格には、数字を入力してください',
            'description' => '商品の説明は、20文字以上で入力してください',
            'url' => 'URLの形式で入力してください'
        ]);
    }
}
