<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create($item_id)
    {
        Like::create([
            'user_id' => Auth::guard('users')->id(),
            'item_id' => $item_id
        ]);
        return back();
    }

    public function destroy($item_id)
    {
        Like::where('user_id', Auth::guard('users')->id())
        ->where('item_id', $item_id)->delete();
        return back();
    }
}
