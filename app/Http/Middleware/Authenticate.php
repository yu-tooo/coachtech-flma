<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    private $user_route = 'user.login';
    private $owner_route = 'owner.login';
    private $admin_route = 'admin.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('user.*')) {
                return route($this->user_route);
            } else if (Route::is('owner.*')) {
                return route($this->owner_route);
            } else {
                return route($this->admin_route);
            }
        }
    }
}
