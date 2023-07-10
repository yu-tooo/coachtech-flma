<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\User;
use Database\Seeders\ItemSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function mypage_view() 
    {
        $this->seed(ItemSeeder::class);
        $this->get(route('user.mypage'))->assertRedirectToRoute('user.login');
        $user = User::factory()->create(['id' => 1]);

        $this->actingAs($user, 'users')->get(route('user.mypage'))
        ->assertStatus(200)->assertSee('item5');
    }

    /** @test */
    function profile_view() 
    {
        $this->get(route('user.profile'))->assertRedirectToRoute('user.login');
        $user = User::factory()->create(['id' => 1]);

        $this->actingAs($user, 'users')->get(route('user.profile'))
        ->assertStatus(200)->assertSee('プロフィール設定')
        ->assertSeeInOrder([
            $user->profile->getUrl(),
            $user->profile->getPostCode(),
            $user->profile->getAddress()
        ]);
    }

    /** @test */
    function profile_validate() 
    {
        $this->post(route('user.profile', []))->assertRedirectToRoute('user.login');
        $this->login();
        $this->from(route('user.profile'))->post(route('user.profile', []))->assertInvalid([
            'name' => '名前は必ず入力してください',
            'postcode' => '郵便番号は必ず入力してください',
            'address' => '住所は必ず入力してください'
        ])->assertRedirectToRoute('user.profile');

        $this->post(route('user.profile', ['postcode' => '123-4567']))
        ->assertInvalid([
            'postcode' => '郵便番号には、数字を入力してください',
            'postcode' => '郵便番号は7桁で入力してください',
        ]);
    }

    /** @test */
    function can_create_profile() 
    {
        $user = User::factory()->create();
        $testRequest = [
            'name' => 'testName',
            'postcode' => 9999999,
            'address' => 'Test address',
            'building' => 'Test building'
        ];

        $this->actingAs($user, 'users')->post(route('user.profile', $testRequest))
        ->assertRedirectToRoute('user.mypage');
        
        $this->assertDatabaseHas('users', ['name' => 'testName']);
        $this->assertDatabaseHas('profiles', [
            'postcode' => 9999999,
            'address' => 'Test address',
            'building' => 'Test building'
        ]);
    }
}
