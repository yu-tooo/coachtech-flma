<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_view(): void
    {
        $this->get(route('user.register'))->assertStatus(200);
    }

    /** @test */
    function registration_validate() 
    {
        $url = route('user.register');
        User::factory()->create(['email' => 'test@example.com']);
        
        $this->from($url)->post(route('user.register', []))->assertRedirect($url);

        $this->post(route('user.register', ['email' => '']))
        ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);
        $this->post(route('user.register', ['email' => 'test@example.com']))
        ->assertInvalid(['email' => 'このメールアドレスは既に存在しています']);

        $this->post(route('user.register', ['password' => '']))
        ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
        $this->post(route('user.register', ['password' => 'abc1234']))
        ->assertInvalid(['password' => 'パスワードは、8文字以上で入力してください']);
    }

    /** @test */
    public function new_users_can_register(): void
    {
        $response = $this->post(route('user.register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}
