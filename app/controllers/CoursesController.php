<?php

class CoursesController extends \BaseController {

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
		$course_type_list = array('' => 'Select Course Type') + CourseType::lists('name', 'id');
		return View::make('courses.create')->with('course_type_list', $course_type_list);
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
		$course->course_type_id = Input::get('type');
		$course->designation = Input::get('designation');
		$course->start_date = Input::get('start_date');
		$course->end_date = Input::get('end_date');
		$course->demo_date = Input::get('demo_date');
		$course->max_students = Input::get('max_students');
		$course->cost = Input::get('cost');
		$course->save();

		return Redirect::action('DashboardsController@showCoursesDashboard');
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
		$course_type_list = array('' => 'Select Course Type') + CourseType::lists('name', 'id');
		return View::make('courses.edit')->with('course', $course)->with('course_type_list', $course_type_list);
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
		$course->course_type_id = Input::get('type');
		$course->designation = Input::get('designation');
		$course->start_date = Input::get('start_date');
		$course->end_date = Input::get('end_date');
		$course->demo_date = Input::get('demo_date');
		$course->max_students = Input::get('max_students');
		$course->cost = Input::get('cost');
		$course->save();

		return Redirect::action('DashboardsController@showCoursesDashboard');
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
