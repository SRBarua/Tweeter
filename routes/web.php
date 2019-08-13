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
    return view('welcome');
});
Route::get('/latest', 'TweetController@list');

Route::middleware('auth')->group(function(){
    Route::resource('/tweets', 'TweetController');
});

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});
Route::resource('/profiles', 'ProfileController');


Route::get('/follow/{user}', 'FollowUserController@store');
Route::post('/follow/{user}', 'FollowUserController@store');

    //Route::get('/posts/{post/unlike}', 'PostController@unlike');
Route::get('/tweets/{tweet}/like', 'TweetController@like');
Route::resource('/tweets', 'TweetController');

Route::resource('/comments', 'CommentController');
Route::post('/comments/{tweet}', 'CommentController@store');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/authtest', function(){
    $user = Auth::user();
    echo 'The logged in user is ' . $user->name .' and their email is ' . $user->email;
});
