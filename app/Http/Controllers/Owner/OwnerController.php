<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index() 
    {
        $ownerName = Auth::guard('owners')->user()->name;
        $users = User::get();
        return view('owner.index', compact('ownerName', 'users'));
    }
}
