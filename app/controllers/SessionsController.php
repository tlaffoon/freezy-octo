<?php

class SessionsController extends \BaseController {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	    {
	        $rules = [
	            'username' => 'required|exists:users',
	            'password' => 'required'
	        ];

	        $input = Input::only('username', 'email', 'password');

	        $validator = Validator::make($input, $rules);

	        if($validator->fails())
	        {
	            return Redirect::back()->withInput()->withErrors($validator);
	        }

	        $credentials = [
	            'username' => Input::get('username'),
	            'password' => Input::get('password'),
	            'confirmed' => 1
	        ];

	        if ( ! Auth::attempt($credentials))
	        {
	            return Redirect::back()
	                ->withInput()
	                ->withErrors([
	                    'credentials' => 'We were unable to sign you in.'
	                ]);
	        }

	        Flash::message('Welcome back!');

	        return Redirect::home();
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
	}


}
