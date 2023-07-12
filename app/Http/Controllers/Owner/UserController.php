<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {
        $ownerName = Auth::guard('owners')->user()->name;
        $users = User::get();
        return view('owner.index', compact('ownerName', 'users'));
    }

    public function detail($user_id)
    {
        $ownerName = Auth::guard('owners')->user()->name;
        $user = User::find($user_id);
        return view('owner.user', compact('ownerName', 'user'));
    }
}
