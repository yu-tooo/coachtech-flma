<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $user_id = Auth::guard('users')->id();
        $items = Item::where('user_id', '!=', $user_id)->get();
        return view('user.index', [ 'items' => $items]);
    }
    
    public function detail($item_id)
    {
        $item = Item::find($item_id);
        return view('user.item', ['item' => $item]);
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
