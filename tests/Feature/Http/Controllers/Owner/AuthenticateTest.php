<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Owner;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function owner_login_view(): void
    {
        $this->get(route('owner.login'))->assertStatus(200);
    }

    /** @test */
    function owner_login_validate()
    {
        $url = route('owner.login');
        Owner::factory()->create([
            'name' => 'Test Owner',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $this->from($url)->post(route('owner.login', []))->assertRedirect($url);

        $this->post(route('owner.login', ['email' => '']))
            ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);

        $this->post(route('owner.login', [
            'email' => 'wrong@example.com',
            'password' => 'password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('owner.login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password'
        ]))->assertInvalid(['email' => 'ログインできません。']);

        $this->post(route('owner.login', ['password' => '']))
            ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
    }

    /** @test */
    function owner_can_authenticate(): void
    {
        $owner = Owner::factory()->create();

        $response = $this->post(route('owner.login'), [
            'email' => $owner->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('owners');
        $response->assertRedirect(RouteServiceProvider::OWNER_HOME);
    }

    /** @test */
    function owner_can_not_authenticate_with_wrong_password(): void
    {
        $owner = Owner::factory()->create();

        $this->post(route('owner.login'), [
            'email' => $owner->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('owners');
    }

    /** @test */
    function owner_can_logout()
    {
        $this->login('owners');
        $this->post(route('owner.logout'))->assertRedirectToRoute('owner.home');
        $this->assertGuest('owners');
    }
}
