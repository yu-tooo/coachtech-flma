<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Owner;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterdUserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function owner_registration_view(): void
    {
        $this->get(route('owner.register'))->assertStatus(200);
    }

    /** @test */
    function owner_registration_validate()
    {
        $url = route('owner.register');
        Owner::factory()->create(['email' => 'test@example.com']);

        $this->from($url)->post(route('owner.register', []))->assertRedirect($url);

        $this->post(route('owner.register', ['email' => '']))
            ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);
        $this->post(route('owner.register', ['email' => 'test@example.com']))
            ->assertInvalid(['email' => 'このメールアドレスは既に存在しています']);

        $this->post(route('owner.register', ['password' => '']))
            ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
        $this->post(route('owner.register', ['password' => 'abc1234']))
            ->assertInvalid(['password' => 'パスワードは、8文字以上で入力してください']);
    }

    /** @test */
    function owner_new_owners_can_register(): void
    {
        $response = $this->post(route('owner.register'), [
            'name' => 'Test Owner',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated('owners');
        $response->assertRedirect(RouteServiceProvider::OWNER_HOME);
    }
}
