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

/* -------------------------------- */

//  Users Resource Route
Route::resource('users', 'UsersController');

/* -------------------------------- */

// User Get Login Route
Route::get('/login', function()
{
    return View::make('users.login');
});

// User Post Login Route
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));

// User Get Logout Route
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

// User Get Profile
Route::get('/profile', function() {

    if(Auth::check()) {
        // On successful authentication, show user profile by default.
        $user = User::find(Auth::id());
        return View::make('users.profile')->with('user', $user);
    } else {
        // Needs logic on failed auth attempt, so you can prompt user to login again.
        return View::make('users.login'); // ->with('alert', 'Please login to continue.');
    }

});

// Main Registration
Route::get('/register', function()
{
    return View::make('users.create');
});

// Post Route for Registration
Route::post('/register', 'UsersController@store');


