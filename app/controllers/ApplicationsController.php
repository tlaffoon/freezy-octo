<?php

class ApplicationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = Application::paginate(5);
		return View::make('applications.index')->with('applications', $applications);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('applications.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
		$validator = Validator::make(Input::all(), Application::$rules);

		if ($validator->fails())
		{
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
		    return Redirect::back()->withInput()->withErrors($validator);
		} 

		else
		{
			// Update user fields which correspond with application.
			$user = User::findOrFail(Auth::id());

			$user->first = Input::get('firstname');
			$user->last = Input::get('lastname');
			$user->fullname = $user->first . ' ' . $user->last;
			$user->gender = Input::get('gender');
			$user->dob = Input::get('dob');
			$user->phone = Input::get('phone');
			// $user->address = Input::get('address');

			if (Input::get('financing_status')) {
				// update user boolean value if financing value is anything but "no".
				// $user->financing
			}

			$user->save();

			// Store submitted application data.
			$app = new Application();
			$app->course_id = Input::get('course_id');
			$app->employment_status = Input::get('employment_status');
			$app->financing_status = Input::get('financing_status');
			$app->referred_by = Input::get('referred_by');
			
			// Uses setter in model to add paragraph breaks
			$app->bg_info = Input::get('bg_info');
			$app->questions = Input::get('questions');

			$app->user_id = Auth::id();
			$app->save();

			// handle resume upload
			if (Input::hasFile('resume') && Input::file('resume')->isValid())
			{
			    $app->addUploadedResume(Input::file('resume'));
			    $app->save();
			}

			// Put application in pending status.
				// Handled automatically when created.

			// Send email confirmation to Jenni with attached resume.
			// Mail::send('email.view', $data, function($message){});

			// Return their profile view with success message.

			// This was for testing only.
				// Define applications and return index view.
				// $applications = Application::paginate(5);
				// return View::make('applications.index')->with('applications', $applications);

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
		$application = Application::findOrFail($id);
		return View::make('applications.show')->with('application', $application);
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
