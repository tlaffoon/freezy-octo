<?php

class DashboardsController extends \BaseController {

	// Primary Dashboard
	public function showPrimaryDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::where('status', '=', 'pending')->get();

		return View::make('dashboards.primary')
			->with('user', $user)
			->with('applications', $applications);
	}



	// Applications Dashboard
	public function showApplicationsDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::where('status', '=', 'pending')->orderBy('id', 'DESC')->get();
		$courses = Course::orderBy('id', 'DESC');
		$students = DB::table('users')->where('role', '=', 'user')->get();

		return View::make('dashboards.applications')
			->with('user', $user)
			->with('applications', $applications)
			->with('courses', $courses)
			->with('students', $students);
	}


	// Courses Dashboard
	public function showCoursesDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$courses = Course::all();

		return View::make('dashboards.courses')
			->with('user', $user)
			->with('courses', $courses);
			// ->with('students', $students);
	}


	// Users Dashboard
	public function showUsersDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::orderBy('id', 'DESC')->paginate(10);
		$courses = Course::orderBy('id', 'DESC')->paginate(3);
		$students = DB::table('users')
			->where('role', '=', 'student')
			->orderBy('created_at', 'DESC')
			->paginate(5);

		return View::make('dashboards.users')
			->with('user', $user)
			->with('applications', $applications)
			->with('courses', $courses)
			->with('students', $students);
	}

}
