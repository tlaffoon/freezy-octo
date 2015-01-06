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


	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        echo 'SUCCESS!';

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('login');

		    }

		}
	}

	/**
	 * Handle user logins.
	 *
	 * @return Response
	 */
	public function handleLogin() {
		$data = Input::only(['email', 'password']);



		if (Input::has('remember_me')) {
		
			$logIn = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true);

		} else {
			
			$logIn = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
		
		}


		if ($logIn) {
		    // Redirect to profile after user login.
			$id = Auth::id();
			$user = User::find($id);
			return Redirect::to('/profile')->with('user', $user);
		} else {
        	Session::flash('alert', 'Please login to continue.');
        	return Redirect::route('login')->withInput();
		}
	}


	/**
	 * Display the specified user's profile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile($id)
	{
		return View::make('users.profile')->with('user', User::find($id));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(10);
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
		    
		    $user->username 	= Input::get('username');
		    // $user->first 		= Input::get('firstname');
		    // $user->last 		= Input::get('lastname');
		    // $user->fullname 	= $user->first . ' ' . $user->last;
		    // $user->phone		= Input::get('phone');
		    $user->email 		= Input::get('email');
		    $user->password 	= Input::get('password');
		    
		    $user->save();

		    // Check for file uploads for user image.
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));
		        $user->save();
		    }

		    // Session::flash('message', 'User account created successfully.');

		    // Login user on creation and redirect to profile.
	        //Auth::login($user);
	        return Redirect::to('/login')->with('message', 'Account created successfully!  Please login below.');
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
				// 'username'				=>  'required',
				'password'				=>	'required|alpha_num|between:6,12|confirmed',
				'password_confirmation'	=>	'required|alpha_num|between:6,12'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {
			
			$user->first 		= Input::get('firstname');
			$user->last 		= Input::get('lastname');
			$user->fullname 	= $user->first . ' ' . $user->last;
			
			$user->phone		= Input::get('phone');

			// Optional user email update.
			if (Input::has('email')) {
				$user->email 	= Input::get('email'); 
			}

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
		
		return Redirect::action('UsersController@show', $user->id);
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

		return Redirect::action('UsersController@index');
	}


}