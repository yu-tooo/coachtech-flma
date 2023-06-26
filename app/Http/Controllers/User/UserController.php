<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::guard('users')->user();
        return view('user.mypage', ['user' => $user]);
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
