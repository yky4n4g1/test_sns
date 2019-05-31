<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
}
