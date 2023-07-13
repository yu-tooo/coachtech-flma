<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admin_login_view(): void
    {
        $this->get(route('admin.login'))->assertStatus(200);
    }

    /** @test */
    function admin_login_validate(): void
    {
        $url = route('admin.login');
        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $this->from($url)->post(route('admin.login', []))->assertRedirect($url);

        $this->post(route('admin.login', ['email' => '']))
            ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);

        $this->post(route('admin.login', [
            'email' => 'wrong@example.com',
            'password' => 'password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('admin.login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('admin.login', ['password' => '']))
            ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
    }

    /** @test */
    function admin_can_authenticate(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'password1234',
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect(RouteServiceProvider::ADMIN_HOME);
    }

    /** @test */
    function admin_can_not_authenticate_with_wrong_password(): void
    {
        $admin = Admin::factory()->create();

        $this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('admin');
    }

    /** @test */
    function admin_can_logout(): void
    {
        $this->login('admin');
        $this->assertAuthenticated('admin');
        $this->post(route('admin.logout'))->assertRedirectToRoute('admin.home');
        $this->assertGuest('admin');
    }
}
