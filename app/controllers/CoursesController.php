<?php

class CoursesController extends \BaseController {

	public function showDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$courses = Course::all();
		// $students = DB::table('users')->where('role', '=', 'user')->get();

		// $data = array(
		//     'user'  => $user,
		//     'applications'   => $applications,
		//     'courses' => $courses
		// );

		return View::make('dashboards.courses')
			->with('user', $user)
			->with('courses', $courses);
			// ->with('students', $students);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		return View::make('courses.index')->with('courses', $courses);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courses.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), Course::$rules);

		if ($validator->fails())
		{
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
		    return Redirect::back()->withInput()->withErrors($validator);
		} else {

		$course = new Course();
		$course->type = Input::get('type');
		$course->description = Input::get('description');
		$course->start_date = Input::get('start_date');
		$course->end_date = Input::get('end_date');
		$course->demo_date = Input::get('demo_date');
		$course->max_students = Input::get('max_students');
		$course->cost = Input::get('cost');
		$course->save();

		return Redirect::action('CoursesController@index');
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
		$course = Course::findOrFail($id);
		return View::make('courses.show')->with('course', $course);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::findOrFail($id);
		return View::make('courses.edit')->with('course', $course);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$validator = Validator::make(Input::all(), Course::$rules);

		if ($validator->fails())
		{
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
		    return Redirect::back()->withInput()->withErrors($validator);
		} else {

		$course = Course::findOrFail($id);
		$course->type = Input::get('type');
		$course->description = Input::get('description');
		$course->start_date = Input::get('start_date');
		$course->end_date = Input::get('end_date');
		$course->demo_date = Input::get('demo_date');
		$course->max_students = Input::get('max_students');
		$course->cost = Input::get('cost');
		$course->save();

		return Redirect::action('CoursesController@index');
		// return Redirect::action('UsersController@showDashboard');
		}
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
