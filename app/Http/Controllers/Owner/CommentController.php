<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function destroy($comment_id)
    {
        Comment::find($comment_id)->delete();
        return back();
    }
}
