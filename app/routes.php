<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Homepage
Route::get('/', function()
{
	return View::make('users.login');
});

// User Get Login Route
Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'));

// User Post Login Route
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));

// User Get Logout Route
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

// User Get Profile
Route::get('/profile', function() {

    if(Auth::check())
    {   
        return View::make('users.profile');
    } else
    {
        return View::make('users.login');
    }

});

// Main Registration
Route::get('/register', function()
{
    return View::make('register');
});

// Post Route for Registration
Route::post('/register', 'UsersController@store');

/* -------------------------------- */

//  Users Resource Route
Route::resource('users', 'UsersController');