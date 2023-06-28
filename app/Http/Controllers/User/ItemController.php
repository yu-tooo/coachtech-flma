<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('user.index', [ 'items' => $items]);
    }
    
    public function detail($id)
    {
        $item = Item::find($id);
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
