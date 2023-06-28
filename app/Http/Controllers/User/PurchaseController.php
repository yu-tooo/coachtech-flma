<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $item = Item::find($item_id);
        return view('user.purchase', ['item' => $item]);
    }

    public function purchase()
    {
        dd('purchase.post');
    }

    public function address()
    {
        return view('user.address');
    }

    public function updateAddress()
    {
        dd('purchase/address.post');
    }
}
