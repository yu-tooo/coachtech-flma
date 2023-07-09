<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function login($gurad = null): void
    {
        $this->actingAs(User::factory()->create(), $gurad);
    }
}
