<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {
        $name = Auth::guard('owners')->user()->name;
        $users = User::get();
        return view('owner.index', compact('name', 'users'));
    }

    public function detail($user_id)
    {
        $name = Auth::guard('owners')->user()->name;
        $user = User::find($user_id);
        return view('owner.user', compact('name', 'user'));
    }
}
