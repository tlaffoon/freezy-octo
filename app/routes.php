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

// Get Homepage Route
Route::get('/', function()
{
    return Redirect::to('login');
});



/* ---------------- SIGNUP ---------------- */

// User Get Signup Route
Route::get('/signup', function()
{
    return View::make('users.signup');
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
            return Redirect::action('DashboardsController@showPrimaryDashboard');
        }

        elseif (Auth::user()->role == 'user') {
            return Redirect::action('UsersController@showProfile', $user->id);
        }
    }

    // Redirect to landing page.
    else {
        return View::make('users.login');
    }
});

// User Post Login Route
Route::post('/login', array(
    'as' => 'login',
    'uses' => 'UsersController@handleLogin')
);

// User Get Logout Route
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

/* ---------------- USER MODIFICATION ---------------- */

//  Assign User to Course POST Route
Route::post('/assignCourse', 'UsersController@assignCourse');

/* ---------------- PROFILE ---------------- */

// User Get Profile

Route::get('/profile', array(
    'as' => 'users.show',
    'uses' => 'UsersController@showProfile')
);



/* ---------------- DASHBOARDS ---------------- */

// Primary Dashboard Get Route
Route::get('/dashboard', array(
    'as' => 'dashboard', 
    'uses' => 'DashboardsController@showPrimaryDashboard')
);

// Primary Dashboard Post Route
// Route::post( '/dashboard/users', array(
//     'as' => 'dashboards.users',
//     'uses' => 'UsersController@showDashboard')
// );

/* ----------------------------------------------- */

// User Dashboard Get Route
Route::get( '/dashboard/users', array(
    'as' => 'dashboards.users',
    'uses' => 'DashboardsController@showUsersDashboard')
);

// User Dashboard Post Route
// Route::post( '/dashboard/users', array(
//     'as' => 'dashboards.users',
//     'uses' => 'DashboardsController@showUserDashboard')
// );

/* ----------------------------------------------- */

// Applications Dashboard Get Route
Route::get( '/dashboard/applications', array(
    'as' => 'dashboards.applications',
    'uses' => 'DashboardsController@showApplicationsDashboard')
);

// Applications Dashboard Post Route
Route::post( '/dashboard/applications', function() {

    $application = Application::findOrFail(Input::get('id'));

    if (Input::get('approve')) {
        $application->status = 'approved';
        $application->save();
        Session::flash('message', 'This is an approve message.');

    } elseif (Input::get('deny')) {
        $application->status = 'denied';
        $application->save();
        Session::flash('message', 'This is a deny message.');
    }

    return Redirect::action('DashboardsController@showApplicationsDashboard');

});



/* ----------------------------------------------- */

// Courses Dashboard Get Route
Route::get( '/dashboard/courses', array(
    'as' => 'dashboards.courses',
    'uses' => 'DashboardsController@showCoursesDashboard')
);

// Courses Dashboard Post Route
Route::post( '/dashboard/courses', array(
    'as' => 'dashboards.courses',
    'uses' => 'DashboardsController@showCoursesDashboard')
);



/* ---------------- RESOURCES ---------------- */

//  Users Resource Route
Route::resource('users', 'UsersController');

//  Applications Resource Route
Route::resource('applications', 'ApplicationsController');

//  Courses Resource Route
Route::resource('courses', 'CoursesController');

//  CourseTypes Resource Route
Route::resource('courseTypes', 'CourseTypesController');

//  Notes Resource Route
Route::resource('comments', 'CommentsController');

//  Mail Resource Route
Route::resource('mail', 'MailController');

//  Send Mail Route
Route::post('/sendMail', 'MailController@send');


