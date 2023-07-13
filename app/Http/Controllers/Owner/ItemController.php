<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $role = Auth::user();
        $items = Item::with('user')->get();
        return view('owner.item', compact('role', 'items'));
    }

    public function detail($item_id)
    {
        $role = Auth::user();
        $item = Item::withCount('like')->withCount('comment')->find($item_id);
        return view('owner.item_detail', compact('role', 'item'));
    }

    public function destroy($item_id)
    {
        Item::find($item_id)->update(['delete_flag' => 1]);
        return back();
    }

    public function restore($item_id)
    {
        Item::find($item_id)->update(['delete_flag' => 0]);
        return back();
    }
}
