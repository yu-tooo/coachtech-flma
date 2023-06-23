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

    public function profile()
    {
        return view('user.reprofile');
    }

    public function purchase()
    {
        return view('user.purchase');
    }

    public function item()
    {
        return view('user.item');
    }

    public function comment()
    {
        return view('user.comment');
    }

    public function mypage()
    {
        return view('user.mypage');
    }
}
