<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
});

Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
Route::get('auth/logout', 'Auth\LoginController@logout');
Route::get('auth/github', 'Auth\LoginController@redirectGithub');
Route::get('auth/github/callback', 'Auth\LoginController@githubCallback');

Route::get('user/{user_id}', 'PageController@showUserPage')
    ->where([
        'user_id' => '[0-9]+'
    ]);
Route::get('user/setting', function () {
    return view('user.setting');
})->middleware('auth');
Route::post('user/setting', 'UserController@changeUserName');

Route::post('comment/save', 'CommentController@saveComment');
Route::post('comment/delete', 'CommentController@deleteComment');
