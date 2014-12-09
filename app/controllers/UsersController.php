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
		
		// Needs flash message to confirm logout.
		return Redirect::to('login');
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
		$users = User::paginate(5);
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
		    
		    $user->firstname 	= Input::get('firstname');
		    $user->lastname 	= Input::get('lastname');
		    $user->fullname 	= $user->firstname . ' ' . $user->lastname;
		    $user->phone		= Input::get('phone');
		    $user->email 		= Input::get('email');
		    $user->password 	= Input::get('password');
		    
		    $user->save();

		    // Check for file uploads for user image.
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));
		        $user->save();
		    }

		    // else {
		    // 	$user->img_path = '/includes/img/placeholder-user.png';
		    // 	$user->save();
		    // }

		    Session::flash('message', 'User account created successfully.');

 		    // $users = User::all();
		    // return View::make('users.index')->with(array('users' => $users));

	        Auth::login($user);
	        return Redirect::to('/profile');
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

		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {
			
			$user->firstname 	= Input::get('firstname');
			$user->lastname 	= Input::get('lastname');
			$user->fullname 	= $user->firstname . ' ' . $user->lastname;
			
			$user->phone		= Input::get('phone');
			$user->email 		= Input::get('email');
			$user->password 	= Input::get('password');
			
			$user->save();

		    // If there is an image to upload, then upload them.
		    if (Input::hasFile('image') && Input::file('image')->isValid())
		    {
		        $user->addUploadedImage(Input::file('image'));
		        $user->save();
		    }

		    // else {
		    // 	$user->img_path = 'http://placehold.it/160x160';
		    // 	$user->save();
		    // }

		    Session::flash('message', 'User saved successfully.');
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
		//
		$user = User::find($id);
		$user->delete();

		Session::flash('message', 'User deleted successfully.');

		return Redirect::action('UsersController@index');
	}


}
