<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($item_id)
    {
        $data = [
            'item' => Item::find($item_id),
            'comments' => Comment::where('item_id', '=', $item_id)
            ->orderBy('updated_at', 'desc')->take(3)
            ->get()
        ];

        return view('user.comment', $data);
    }

    public function create(Request $request, $item_id)
    {
        Comment::create([
            'user_id' => Auth::guard('users')->id(),
            'item_id' => $item_id,
            'comment' => $request->comment
        ]);
        return redirect(route('user.comment', ['item_id' => $item_id]));
    }
}
