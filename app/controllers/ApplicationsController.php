<?php

class ApplicationsController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth');
	}
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = Application::orderBy('id', 'DESC')->paginate(5);
		return View::make('applications.index')->with('applications', $applications);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$course_list = array('' => 'Select Course') + Course::where('status', '=', 'active')->lists('designation', 'id');
		return View::make('applications.create')->with('course_list', $course_list);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// Get all the input and store it inside variable.
		$data = Input::all();

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
			$user->gender = Input::get('gender');
			$user->dob = Input::get('dob');
			$user->phone = Input::get('phone');
			$user->street = Input::get('street');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->zip = Input::get('zip');

			if (Input::get('financing_status')) {
				// update user boolean value if financing value is anything but "no".
				// $user->financing
			}

			$user->save();

			// Store submitted application data.
			$application = new Application();
			$application->course_id = Input::get('course_id');
			$application->employment_status = Input::get('employment_status');
			$application->financing_status = Input::get('financing_status');
			$application->referred_by = Input::get('referred_by');
			
			// Uses setter in model to add paragraph breaks on new lines for readability.
			$application->bg_info = Input::get('bg_info');
			$application->questions = Input::get('questions');

			$application->user_id = Auth::id();
			$application->save();

			// handle resume upload
			if (Input::hasFile('resume') && Input::file('resume')->isValid())
			{
			    $application->addUploadedResume(Input::file('resume'));
			    $application->save();
			}

			// Put application in pending status.
				// Handled automatically when created.
			
			// This is how you get an object into the array for Mail.  Blammo.
			$data['application'] = $application;
			$data['user'] = $user;

			// Send email confirmation to info@codeup.com with attached resume.
			Mail::send('emails.application.new', $data, function($message) use ($data) {
		    	$message->from($data['user']['email'] , $data['user']['fullname']);
				$message->to('thomas@codeup.com', 'Staff');
				$message->subject('New Application Submitted');

				if ($data['application']['resume_path']) {
					$message->attach($data['application']['resume_path']);
				}
			});

			
			Session::flash('message', 'Thanks for applying! We will get in touch with you as soon as possible.');
			// Return their profile view with success message.
			return Redirect::action('UsersController@showProfile');

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
		// $comments = DB::table('comments')->where('commentable_id', '=', $application->id)->orderBy('created_at', 'DESC');
		$comments = Comment::where('commentable_id', '=', $application->id)->orderBy('created_at', 'DESC')->get();
		return View::make('applications.show')
			->with('application', $application)
			->with('comments', $comments);
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
		$application = Application::find($id);
		$application->delete();

		Session::flash('message', 'Application removed.');

		return Redirect::action('DashboardsController@showUsersDashboard');
	}


}
