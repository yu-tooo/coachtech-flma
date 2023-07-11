<?php

namespace Tests\Feature\Http\Controllers\Owner;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function owner_home_view() 
    {
        $this->get(route('owner.home'))->assertRedirectToRoute('owner.login');

        $this->login('owners');
        $this->get(route('owner.home'))->assertStatus(200);
    }
}
