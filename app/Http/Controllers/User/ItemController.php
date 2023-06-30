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

        $items = Item::where('user_id', '!=', $user_id)->doesntHave('sold_items')
        ->get();

        $likedItems = Item::whereHas('likes', function($query) use($user_id) {
            $query->where('user_id', $user_id);
        })->doesntHave('sold_items')->get();

        return view('user.index', ['items' => $items, 'l_items' => $likedItems]);
    }
    
    public function detail($item_id)
    {
        $items = Item::find($item_id);
        $class = Item::find($item_id)->categories()->pluck('name');
        return view('user.item', ['item' => $items, 'categories' => $class]);
    }

    public function sellView()
    {
        return view('user.sell');
    }

    public function sellCreate(Request $request)
    {
        dd($request);
    }
}
