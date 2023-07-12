<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $ownerName = Auth::guard('owners')->user()->name;
        $items = Item::with('user')->get();
        return view('owner.item', compact('ownerName', 'items'));
    }
}
