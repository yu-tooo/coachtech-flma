<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::guard('users')->user();
        return view('user.mypage', ['user' => $user]);
    }

    public function profile()
    {
        $user = Auth::guard('users')->user();
        return view('user.reprofile', ['user' => $user]);
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
