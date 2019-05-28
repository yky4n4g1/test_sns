<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function showMyComments()
    {
        $comments = Comment::where("user_id", Auth::user()->id)->get();

        return view("user.home", compact("comments"));
    }

    public function showUserPage($user_id)
    {
        User::findOrFail($user_id);
        $comments = Comment::where("user_id", $user_id)->get();

        return view("user.home", compact("comments", "user_id"));
    }
}
