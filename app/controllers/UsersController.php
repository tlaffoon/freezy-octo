<?php

class UsersController extends \BaseController {

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('except'=>array('login', 'handleLogin', 'store')));
	}


	/**
	 * Return user login form.
	 *
	 * @return Response
	 */
	public function login()
	{
		return View::make('users.login');
	}


	/**
	 * Log user out and return to login form.
	 *
	 * @return Response
	 */
	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
		}
		
		return Redirect::to('login')->with('message', 'You have successfully logged out.');
	}


	/**
	 * Handle user logins.
	 *
	 * @return Response
	 */
	public function handleLogin() {
		// Capture input from form.
		$data = Input::only(['email', 'password']);

		// Check remember_me token.
		if (Input::has('remember_me')) {
		
			$logIn = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);

		} else {
			
			$logIn = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
		
		}

		// If login successful, continue.
		if ($logIn) {

			// Define $user.
			$user = User::find(Auth::id());

			// Check for user role.
			if (Auth::user()->role == 'staff') {

				// Send staff to dashboard.
			    return Redirect::to('/dashboard')->with('user', $user);

			    // Redirect to action within user's controller for admin dashboard.
			    // Redirect::action('UsersController@profile', array('user' => $user));
			}

			elseif (Auth::user()->role == 'user') {
			    
			    // Send users to their profile
			    return Redirect::to('/profile')->with('user', $user);

			    // Redirect to action within user's controller for user profile.
			    // Redirect::action('UsersController@profile', array('user' => $user));
			}

		} else {
			// Alert and send back to login page.
        	Session::flash('alert', 'Incorrect login information.');
        	return Redirect::route('login')->withInput();
		}
	}


	/**
	 * Display the specified user's profile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showProfile()
	{
		$user = User::findOrFail(Auth::id());
		return View::make('users.profile')->with('user', $user);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('fullname', 'ASC')->paginate(10);
		return View::make('users.index')->with(array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
		$validator = Validator::make(Input::all(), User::$rules);

		// attempt validation
		if ($validator->fails()) {
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');

		    // validation failed, redirect to the user create page with validation errors and old inputs
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		
		else {
		    $user = new User();
		    
		    $user->first 		= Input::get('first');
		    $user->last 		= Input::get('last');
		    $user->email 		= Input::get('email');
		    $user->password 	= Input::get('password');
		    $user->save();

		    // Check for file uploads for user image.
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));
		        $user->save();
		    }

		    Session::flash('message', 'Account created successfully!');

		    // Log User In
		    $user = User::find($user->id);
		    Auth::login($user);

		    return Redirect::action('UsersController@showProfile');

	        // return Redirect::to('/login')->with('message', 'Account created successfully!  Please login below.');

		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('users.show')->with('user', User::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit')->with('user', User::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($id != null) {
			$user = User::findOrFail($id);
		}

		$rules = array(
				'password'				=>	'required|alpha_num|between:6,12|confirmed',
				'password_confirmation'	=>	'required|alpha_num|between:6,12'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {
			
			$user->first 		= Input::get('first');
			$user->last 		= Input::get('last');
			$user->email 		= Input::get('email');
			$user->phone		= Input::get('phone');
			$user->street 		= Input::get('street');
			$user->city 		= Input::get('city');
			$user->state 		= Input::get('state');
			$user->zip 			= Input::get('zip');
			
			$user->password 	= Input::get('password');
			$user->save();

		    // If there is an image to upload, then upload them.
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));
		        $user->save();
		    }

		    Session::flash('message', 'Update successful.');
		}
		
		return Redirect::action('UsersController@showProfile', $user->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		Session::flash('message', 'User deleted successfully.');

		return Redirect::action('DashboardsController@showUsersDashboard');
	}


}