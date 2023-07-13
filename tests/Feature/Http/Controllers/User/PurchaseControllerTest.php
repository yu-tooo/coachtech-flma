<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\User;
use Database\Seeders\ItemSeeder;
use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function purchase_view(): void
    {
        $this->seed([ItemSeeder::class, ProfileSeeder::class]);
        $withProfileUser = User::factory()->create(['id' => 1]);
        $withoutProfileUser = User::factory()->create(['id' => 10]);

        $this->get(route('user.purchase', ['item_id' => 1]))
        ->assertRedirectToRoute('user.login');

        $this->actingAs($withProfileUser, 'users')
        ->get(route('user.purchase', ['item_id' => 1]))->assertStatus(200)->assertSee('購入する');

        $this->actingAs($withoutProfileUser, 'users')
        ->get(route('user.purchase', ['item_id' => 1]))
        ->assertRedirectToRoute('user.profile');
    }

    /** @test */
    function can_purchase(): void
    {
        $user = User::factory()->create(['id' => 4]);
        $this->actingAs($user, 'users')->post(route('user.purchase', ['item_id' => 2]))
        ->assertRedirectToRoute('user.mypage');

        $this->assertDatabaseHas('sold_item', [
            'item_id' => 2,
            'user_id' => 4
        ]);
    }

    /** @test */
    function address_view(): void
    {
        $this->seed([ItemSeeder::class, ProfileSeeder::class]);
        $withProfileUser = User::factory()->create(['id' => 1]);
        $withoutProfileUser = User::factory()->create(['id' => 10]);

        $this->get(route('user.address', ['item_id' => 1]))
        ->assertRedirectToRoute('user.login');

        $this->actingAs($withProfileUser, 'users')
        ->get(route('user.address', ['item_id' => 1]))
        ->assertStatus(200)->assertSee('住所の変更')
        ->assertSeeInOrder([
            $withProfileUser->profile->getPostCode(),  
            $withProfileUser->profile->getAddress(),  
            $withProfileUser->profile->getBuilding()  
        ]);

        $this->actingAs($withoutProfileUser, 'users')
        ->get(route('user.address', ['item_id' => 1]))
        ->assertRedirectToRoute('user.profile');
    }

    /** @test */
    function address_validate(): void
    {
        $this->login();
        $this->post(route('user.address', ['item_id' => 1]))->assertRedirect();

        $this->post(route('user.address', ['item_id' => 1]))
        ->assertInvalid([
            'postcode' => '郵便番号は必ず入力してください',
            'address' => '住所は必ず入力してください'
        ]);

        $this->post(route('user.address', [
            'item_id' => 1, 'address' => 'testadress', 'postcode' => '123-4567'
        ]))->assertInvalid([
            'postcode' => '郵便番号には、数字を入力してください',
            'postcode' => '郵便番号は7桁で入力してください'
        ]);
    }

    /** @test */
    function can_change_address(): void
    {
        $this->seed(ProfileSeeder::class);
        $user = User::factory()->create(['id' => 1]);
        $this->actingAs($user, 'users')->post(route('user.address', [
            'item_id' => 1,
            'postcode' => 1234567,
            'address' => 'テスト1丁目サンプル番地',
            'building' => 'testing'
        ]))->assertRedirectToRoute('user.purchase', ['item_id' => 1]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'postcode' => '1234567',
            'address' => 'テスト1丁目サンプル番地',
            'building' => 'testing'
        ]);
    }
}
