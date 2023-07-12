<?php

namespace Tests;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function login($gurad = null): void
    {
        switch ($gurad) {
            case 'owners':
                $this->actingAs(Owner::factory()->create(), 'owners');
                break;
            case 'admin':
                $this->actingAs(Admin::factory()->create(), 'admin');
                break;
            default;
                $this->actingAs(User::factory()->create(), $gurad);
                break;
        }
        
    }
}
