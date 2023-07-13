<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Admin;
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
        $this->get(route('owner.register'))->assertRedirect();
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin')->get(route('owner.register'))
        ->assertStatus(200);
    }

    /** @test */
    function owner_registration_validate() :void
    {
        $url = route('owner.register');
        $admin = Admin::factory()->create();
        Owner::factory()->create(['email' => 'test@example.com']);

        $this->actingAs($admin, 'admin')->from($url)->post(route('owner.register', []))->assertRedirect($url);

        $this->actingAs($admin, 'admin')->post(route('owner.register', ['email' => '']))
            ->assertInvalid(['email' => 'メールアドレスは必ず入力してください']);
        $this->actingAs($admin, 'admin')->post(route('owner.register', ['email' => 'test@example.com']))
            ->assertInvalid(['email' => 'このメールアドレスは既に存在しています']);

        $this->actingAs($admin, 'admin')
        ->post(route('owner.register', ['password' => '']))
            ->assertInvalid(['password' => 'パスワードは必ず入力してください']);
        $this->actingAs($admin, 'admin')
        ->post(route('owner.register', ['password' => 'abc1234']))
            ->assertInvalid(['password' => 'パスワードは、8文字以上で入力してください']);
    }

    /** @test */
    function owner_new_owners_can_register(): void
    {
        $admin = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('owner.register'), [
            'name' => 'Test Owner',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirectToRoute('owner.register');
    }

    /** @test */
    function owner_owners_can_be_deleted(): void
    {
        $owner = Owner::factory()->create();
        $admin = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('owner.delete', [
            'owner_id' => $owner->id
        ]));

        $this->assertDatabaseMissing('owners', [
            'id' => $owner->id,
            'name' => $owner->name,
            'email' => $owner->email
        ]);
        $response->assertRedirectToRoute('owner.register');
    }
}
