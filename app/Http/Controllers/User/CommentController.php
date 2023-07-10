<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\CommentRequest;

class CommentController extends Controller
{
    public function index($item_id)
    {
        $item = Item::withCount('like')->withCount('comment')->find($item_id);
        $comments = Comment::where('item_id', '=', $item_id)->orderBy('updated_at', 'desc')
        ->take(3)->get();

        return view('user.comment', ['item' => $item, 'comments' => $comments]);
    }

    public function create(CommentRequest $request, $item_id)
    {
        Comment::create([
            'user_id' => Auth::guard('users')->id(),
            'item_id' => $item_id,
            'comment' => $request->comment
        ]);
        return redirect(route('user.comment', ['item_id' => $item_id]));
    }
}
