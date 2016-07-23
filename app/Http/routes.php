<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::auth();

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['prefix'=> 'api'], function() {
    Route::get('users', function() {
      return \LTP\User::all()->load('accounts')->load('projects')->load('creatorOf');
    });
    Route::get('projects', function() {
        return \LTP\Project::all()->load('updates');
    });
});

Route::get('/test', function() {
    dd(Auth::user());
    dd(Socialite::driver('github')->user());
});

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
