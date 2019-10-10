<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function changeUserName(Request $request)
    {
        $this->middleware('auth');

        $rules = [
            'new_name' => ['required', 'max:50']
        ];
        $request->validate($rules);

        User::find(Auth::user()->id)->update(['name' => $request->new_name]);
        return redirect('/user/setting');
    }

    public function searchUser(Request $request)
    {
        $rules = [
            'search_word' => ['required', 'max:50']
        ];
        $request->validate($rules);
        $word = $request->search_word;

        $users = DB::table('users')
            ->select(['id', 'name'])
            ->where('name', 'like', "%{$request->search_word}%")
            ->get();

        return view('user.search', compact("users", "word"));
    }
}
