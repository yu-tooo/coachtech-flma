<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Profile;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::guard('users')->user();
        $purchasedItem = Item::whereHas('sold_items', function($query) {
            $query->where('user_id', Auth::guard('users')->id());
        });

        $data = [
            'user' => $user,
            's_items' => Item::where('user_id', $user->id)->get(),
            'p_items' => $purchasedItem->get()
        ];
        return view('user.mypage', $data);
    }

    public function profile()
    {
        return view('user.reprofile', ['user' => Auth::guard('users')->user()]);
    }


    public function updateProfile(Request $request)
    {
        $user_id = Auth::guard('users')->id();
        $profile = Profile::where('user_id', $user_id);
        User::find($user_id)->update(['name' => $request->name]);

        $new_img = $request->image ? $request->file('image')->store('public/image/users'): $profile->value('img_url');        
        
        $request->image && 
        Storage::delete("public/image/users/" . basename($profile->value('img_url')));
        
        $img_url = $new_img == "" ? 'default.png': mb_substr($new_img, mb_strpos($new_img, 'users/'));

        if ($profile->exists()) {
            $profile->update([
                'img_url' => $img_url,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);
        } else {
            Profile::create([
                'user_id' => $user_id,
                'img_url' => $img_url,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }

        return redirect(route('user.mypage'));
    }

}
