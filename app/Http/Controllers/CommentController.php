<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $rules = [
            'comment' => ['required', 'max:1000']
        ];

        $validatedData = $request->validate($rules);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->sum_likes = 0;

        $comment->save();
        return redirect("/user/" . Auth::user()->id);
    }
}
