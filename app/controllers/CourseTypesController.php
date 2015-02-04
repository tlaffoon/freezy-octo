<?php

class CourseTypesController extends \BaseController {

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
		$validator = Validator::make(Input::all(), CourseType::$rules);

		if ($validator->fails())
		{
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
		    return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$courseType = new CourseType();
			$courseType->name = Input::get('name');
			$courseType->description = Input::get('description');
			$courseType->duration = Input::get('duration');
			$courseType->save();
		}

		return Redirect::action('DashboardsController@showCoursesDashboard');
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
		$validator = Validator::make(Input::all(), CourseType::$rules);

		if ($validator->fails())
		{
			Session::flash('alert', 'There were errors submitting your form.  Did you include all fields?');
		    return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$courseType = CourseType::find($id);
			$courseType->name = Input::get('name');
			$courseType->description = Input::get('description');
			$courseType->duration = Input::get('duration');
			$courseType->save();
		}

		return Redirect::action('DashboardsController@showCoursesDashboard');
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
