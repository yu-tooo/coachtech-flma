<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Item;
use App\Models\SoldItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AddressRequest;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        if(!Profile::where('user_id', Auth::guard('users')->id())->exists()){
            return redirect(route('user.profile'));
        } 

        $item = Item::find($item_id);
        return view('user.purchase', ['item' => $item]);
    }

    public function purchase($item_id)
    {
        SoldItem::create([
            'item_id' => $item_id,
            'user_id' => Auth::guard('users')->id()
        ]);
        return redirect(route('user.mypage'));
    }

    public function address($item_id)
    {
        if (!Profile::where('user_id', Auth::guard('users')->id())->exists()) {
            return redirect(route('user.profile'));
        } 
        $profile = Profile::where('user_id', Auth::guard('users')->id())->first();
        
        return view('user.address', ['profile' => $profile, 'item_id' => $item_id]);
    }

    public function updateAddress(AddressRequest $request, $item_id)
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
