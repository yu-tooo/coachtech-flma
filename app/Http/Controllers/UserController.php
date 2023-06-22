<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() 
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function address()
    {
        return view('user.address');
    }

    public function sell() 
    {
        return view('user.sell');
    }
}
