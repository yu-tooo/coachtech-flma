<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {
        $role = Auth::user();
        $users = User::get();
        return view('owner.index', compact('role', 'users'));
    }

    public function detail($user_id)
    {
        $role = Auth::user();
        $user = User::find($user_id);
        return view('owner.user', compact('role', 'user'));
    }
}
