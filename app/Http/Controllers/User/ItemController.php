<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $isAuth = Auth::guard('users')->check();
        return view('user.index', ['isAuth' => $isAuth]);
    }
    
    public function detail()
    {
        $isAuth = Auth::guard('users')->check();
        return view('user.item', ['isAuth' => $isAuth]);
    }

    public function sellView()
    {
        return view('user.sell');
    }

    public function sellCreate()
    {
        dd('item.post');
    }
}
