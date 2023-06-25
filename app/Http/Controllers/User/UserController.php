<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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

    public function comment()
    {
        return view('user.comment');
    }

    public function mypage()
    {
        return view('user.mypage');
    }
}
