<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;

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
        
        User::find($user_id)
        ->update(['name' => $request->name]);

        if (Profile::where('user_id', $user_id)->exists()) {
            Profile::where('user_id', $user_id)
            ->update([
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);
        } else {
            Profile::create([
                'user_id' => $user_id,
                'img_url' => $request->img_url ?? 'default.png',
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }

        return redirect(route('user.mypage'));
    }

}
