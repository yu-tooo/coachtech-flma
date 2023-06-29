<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Sold_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $item = Item::find($item_id);
        return view('user.purchase', ['item' => $item]);
    }

    public function purchase($item_id)
    {
        Sold_item::create([
            'user_id' => Auth::guard('users')->id(),
            'item_id' => $item_id
        ]);
        return redirect(route('user.mypage'));
    }

    public function address($item_id)
    {
        $user = Profile::where('user_id', Auth::guard('users')->id())->first();
        $data = [
            'user' => $user,
            'item_id' => $item_id
        ];
        return view('user.address', $data);
    }

    public function updateAddress(Request $request, $item_id)
    {
        Profile::where('user_id', Auth::guard('users')->id())
        ->update([
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building
        ]);
        return redirect(route('user.purchase', ['item_id' => $item_id]));
    }
}
