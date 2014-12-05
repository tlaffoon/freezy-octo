<?php

class UsersController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login() 
	{
		return View::make('users.login');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function logout()
	{
		if(Auth::check()){
		  Auth::logout();
		}
		
		// Needs flash message to confirm logout.
		return Redirect::route('login');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function handleLogin() {
		$data = Input::only(['email', 'password']);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            // Redirect to profile after user login.
            return Redirect::to('/profile');
        }

        // Needs flash message included to instruct "Try again."
        return Redirect::route('login')->withInput();
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function profile()
	{
		return View::make('users.profile');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$users = User::all();

		return View::make('users.index')->with(array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');

		    // validation failed, redirect to the user create page with validation errors and old inputs
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		
		else {
		    $user = new User();
		    
		    $user->first 		= Input::get('first');
		    $user->last 		= Input::get('last');
		    $user->fullname 	= $user->first . ' ' . $user->last;
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

		    else {
		    	$user->img_path = '/includes/img/placeholder-user.png';
		    	$user->save();
		    }

		    Session::flash('message', 'User saved successfully.');
		    //return Redirect::action('UsersController@show', $user->id);
		    $users = User::all();
		    return View::make('users.index')->with(array('users' => $users));
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
		//
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
		//
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
		//
		if ($id != null) {
			$user = User::findOrFail($id);
		}

		else {
			$user = new User();
		}

		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			Session::flash('errorMessage', 'There were errors submitting your form.  Did you include all fields?');
			return Redirect::back()->withInput()->withErrors($validator);
		}

		else {
			$user = new User();
			
			$user->first 		= Input::get('first');
			$user->last 		= Input::get('last');
			$user->fullname 	= $user->first . ' ' . $user->last;
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

		    else {
		    	$user->img_path = 'http://placehold.it/160x160';
		    	$user->save();
		    }

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
