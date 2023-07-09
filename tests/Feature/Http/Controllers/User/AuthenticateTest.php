<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_view(): void
    {
        $this->get(route('user.login'))->assertStatus(200);
    }

    /** @test */
    function login_validate() 
    {
        $url = route('user.login');
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $this->from($url)->post(route('user.login', []))->assertRedirect($url);

        $this->post(route('user.login', ['email' => '']))
        ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);

        $this->post(route('user.login', [
            'email' => 'wrong@example.com',
            'password' => 'password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('user.login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('user.login', ['password' => '']))
        ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
    }

    /** @test */
    public function can_authenticate(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('user.login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /** @test */
    public function can_not_authenticate_with_wrong_password(): void
    {
        $user = User::factory()->create();

        $this->post(route('user.login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    /** @test */
    function can_logout() 
    {
        $this->login('users');
        $this->post(route('user.logout'))->assertRedirect(route('user.home'));
        $this->assertGuest('users');
    }
}
