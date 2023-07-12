<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function owner_home_view(): void
    {
        $this->get(route('owner.home'))->assertRedirectToRoute('owner.login');

        $owner = Owner::factory()->create();
        $users = User::factory(3)->create()->toArray();
        $this->actingAs($owner, 'owners')->get(route('owner.home'))->assertStatus(200)
        ->assertSee($owner->name)
        ->assertSee($users[0]['name'], $users[1]['name'], $users[2]['name']);
    }

    /** @test */
    function owner_user_detail(): void
    {
        $user = User::factory()->create();
        $this->get(route('owner.user', ['user_id' => $user->id]))
        ->assertRedirectToRoute('owner.login');

        $this->login('owners');
        $this->get(route('owner.user', ['user_id' => $user->id]))->assertStatus(200)
        ->assertSee('プロフィール')
        ->assertSee($user->name)
        ->assertDontSee('このユーザを削除する');

        $this->login('admin');
        $this->get(route('owner.user', ['user_id' => $user->id]))->assertStatus(200)
        ->assertSee('このユーザを削除する');
    }
}
