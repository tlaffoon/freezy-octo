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



/* -------------------------------- */
// RESOURCES

//  Users Resource Route
Route::resource('users', 'UsersController');

//  Applications Resource Route
Route::resource('applications', 'ApplicationsController');

//  Courses Resource Route
Route::resource('courses', 'CoursesController');

/* -------------------------------- */
// MAIN ROUTES

// Homepage
Route::get('/', function()
{
    //  If user is already authenticated, redirect to their main view - else login view.
    if (Auth::check()) {
        $user = User::find(Auth::id());
        return View::make('users.show')->with('user', $user);
    } else {
        return View::make('users.login');
    }
});

// // User Get Login Route
Route::get('/login', function()
{
    //  If user is already authenticated, redirect to their main view - else login view.
    if (Auth::check()) {
        $user = User::find(Auth::id());
        return View::make('users.show')->with('user', $user);
    } else {
        return View::make('users.login');
    }

});

// User Post Login Route
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));

// User Get Logout Route
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

// User Get Signup Route
Route::get('/signup', function()
{
    //  If user is already authenticated, redirect to their main view - else signup view.
    if (Auth::check()) {
        $user = User::find(Auth::id());
        return View::make('users.show')->with('user', $user);
    } else {
        return View::make('users.signup');
    }

});

// User Post Signup Route
Route::post('/signup', array('as' => 'login', 'uses' => 'UsersController@store'));

// User Get Profile
Route::get('/profile', function() {

    // Not sure that any of this is even necessary anymore, since routes are protected in controller.
    if(Auth::check()) {
        // On successful authentication, show user profile by default.
        $user = User::find(Auth::id());
        return View::make('users.show')->with('user', $user);
    } else {
        // Needs logic on failed auth attempt, so you can prompt user to login again.
        return Redirect::to('/login')->with('alert', 'Please login to continue.');
    }

});

Route::get('register', function() {
    return Redirect::to('/signup');
});
