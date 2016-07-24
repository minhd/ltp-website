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

Route::get('/', 'PageController@home');
Route::get('/home', 'PageController@home');

Route::model('projects', \LTP\Project::class);
Route::resource('projects', 'ProjectController');
Route::get('join/{projects}', 'UserController@join');

Route::auth();

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['prefix'=> 'api'], function() {
    Route::get('users', function() {
      return \LTP\User::all()->load('accounts')->load('projects')->load('creatorOf');
    });
    Route::get('projects', function() {
        return \LTP\Project::all()->load('updates')->load('contributors');
    });
});

Route::get('/test', function() {
    dd(Auth::user());
    dd(Socialite::driver('github')->user());
});
