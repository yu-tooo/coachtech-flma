<?php

namespace Tests\Feature\Http\Controllers\Owner;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function owner_home_view() 
    {
        $this->get(route('owner.home'))->assertRedirectToRoute('owner.login');

        $owner = Owner::factory()->create();
        $users = User::factory(3)->create()->toArray();
        $this->actingAs($owner, 'owners')->get(route('owner.home'))->assertStatus(200)
        ->assertSee($owner->name)
        ->assertSee($users[0]['name'], $users[1]['name'], $users[2]['name']);
    }
}
