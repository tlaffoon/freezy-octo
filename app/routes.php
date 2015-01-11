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
    return Redirect::to('login');
});

// // User Get Login Route
Route::get('/login', function()
{
    //  Check for user authentication
    if (Auth::check()) {

        // Define $user.
        $user = User::find(Auth::id());

        // Check for user role.
        if (Auth::user()->role == 'staff') {
            // $applications = Application::orderBy('id', 'DESC')->paginate(10);
            // $courses = Course::orderBy('id', 'DESC')->paginate(3);
            // return View::make('users.dashboard')->with('user', $user)->with('applications', $applications)->with('courses', $courses);
            return Redirect::action('UsersController@showDashboard');
        }

        elseif (Auth::user()->role == 'user') {
            return View::make('users.show')->with('user', $user);
        }
        
    } 

    // Redirect to login page.
    else {
        return View::make('users.login')->with('alert', 'Please login to continue.');
    }
});

// User Dashboard Get Route
Route::get( '/dashboard', array(
    'as' => 'users.dashboard',
    'uses' => 'UsersController@showDashboard'
) );

// User Dashboard Post Route
Route::post( '/dashboard', array(
    'as' => 'users.dashboard',
    'uses' => 'UsersController@showDashboard'
) );

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
Route::post('/signup', array('as' => 'signup', 'uses' => 'UsersController@store'));

// User Get Profile
Route::get('profile', function()
{
    if(Auth::check()) {
        
        $user = User::find(Auth::id());
        return View::make('users.show')->with('user', $user);

    } else {
        
        return Redirect::to('/login')->with('alert', 'Please login to continue.');
    }
});

// // User Get Dashboard Route
// Route::get('dashboard', function()
// {
//     if(Auth::check() && Auth::user()->role == 'staff') {
        
//         $user = User::find(Auth::id());
//         return View::make('users.dashboard')->with('user', $user);

//     } else {
        
//         return Redirect::back()->with('alert', 'Access denied.');
//     }
// });

// User Get Register Route
Route::get('register', function() {
    return Redirect::to('/signup');
});
