<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function mypage()
    {
        return view('user.mypage');
    }

    public function profile()
    {
        return view('user.reprofile');
    }

    public function updateProfile()
    {
        dd('profile.post');
    }

}
