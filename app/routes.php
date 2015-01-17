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


/* ---------------- HOMEPAGE ---------------- */

Route::get('dashboard', function() {
    return View::make('dashboards.primary');
});

// Get Homepage Route
Route::get('/', function()
{
    return View::make('landing');
});



/* ---------------- SIGNUP ---------------- */

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



/* ---------------- LOGIN/LOGOUT ---------------- */

// User Get Login Route
Route::get('/login', function()
{
    //  Check for user authentication
    if (Auth::check()) {

        // Define $user.
        $user = User::find(Auth::id());

        // Check for user role.
        if (Auth::user()->role == 'staff') {
            return Redirect::action('UsersController@showDashboard');
        }

        elseif (Auth::user()->role == 'user') {
            return Redirect::action('UsersController@show', $user->id);
        }
    }

    // Redirect to login page.
    else {
        return View::make('users.login')->with('alert', 'Please login to continue.');
    }
});

// User Post Login Route
Route::post('/login', array(
    'as' => 'login', 
    'uses' => 'UsersController@handleLogin')
);

// User Get Logout Route
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));




/* ---------------- PROFILE ---------------- */

// User Get Profile
// Route::get('/profile', function()
// {
//     if ($user->role == 'user') {
//         # code...
//     }

//     else {
//         return UsersController@showProfile
//     }
//     $user = User::find(Auth::id());
//     return View::make('users.show')->with('user', $user);
  
//     return Redirect::to('/login')->with('alert', 'Please login to continue.');
//     }
// });

Route::get('/profile', array(
    'as' => 'users.show',
    'uses' => 'UsersController@showProfile')
);



/* ---------------- DASHBOARDS ---------------- */

// Primary Dashboard Get Route
// Route::get( '/dashboard/users', array(
//     'as' => 'dashboards.users',
//     'uses' => 'UsersController@showDashboard')
// );

// // Primary Dashboard Post Route
// Route::post( '/dashboard/users', array(
//     'as' => 'dashboards.users',
//     'uses' => 'UsersController@showDashboard')
// );

/* ----------------------------------------------- */

// User Dashboard Get Route
Route::get( '/dashboard/users', array(
    'as' => 'dashboards.users',
    'uses' => 'UsersController@showDashboard')
);

// User Dashboard Post Route
Route::post( '/dashboard/users', array(
    'as' => 'dashboards.users',
    'uses' => 'UsersController@showDashboard')
);

/* ----------------------------------------------- */

// Applications Dashboard Get Route
Route::get( '/dashboard/applications', array(
    'as' => 'dashboards.applications',
    'uses' => 'ApplicationsController@showDashboard')
);

// Applications Dashboard Post Route
// Route::post( '/dashboard/applications', array(
//     'as' => 'dashboards.applications',
//     'uses' => 'ApplicationsController@showDashboard')
// );

// Ajax Request Route
Route::post( '/dashboard/applications', array(
    'as' => 'dashboards.applications',
    'uses' => 'ApplicationsController@processAjax')
);

/* ----------------------------------------------- */

// Courses Dashboard Get Route
Route::get( '/dashboard/courses', array(
    'as' => 'dashboards.courses',
    'uses' => 'CoursesController@showDashboard')
);

// Courses Dashboard Post Route
Route::post( '/dashboard/courses', array(
    'as' => 'dashboards.courses',
    'uses' => 'CoursesController@showDashboard')
);





/* ---------------- RESOURCES ---------------- */

//  Users Resource Route
Route::resource('users', 'UsersController');

//  Applications Resource Route
Route::resource('applications', 'ApplicationsController');

//  Courses Resource Route
Route::resource('courses', 'CoursesController');

//  Notes Resource Route
// Route::resource('notes', 'NotesController');
