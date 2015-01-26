<?php

class DashboardsController extends \BaseController {

	// Authentication Filter
	public function __construct() {
		$this->beforeFilter('auth');
	}


	// Primary Dashboard
	public function showPrimaryDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::where('status', '=', 'pending')->get();
		$unreadNotifications = $user->notifications()->unread()->get();

		return View::make('dashboards.primary')
			->with('user', $user)
			->with('applications', $applications)
			->with('notifications', $unreadNotifications);
	}


	// Applications Dashboard
	public function showApplicationsDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::where('status', '=', 'pending')->orderBy('id', 'DESC')->get();
		$courses = Course::orderBy('id', 'DESC');
		$students = DB::table('users')->where('role', '=', 'user')->get();
		$unreadNotifications = $user->notifications()->unread()->get();

		return View::make('dashboards.applications')
			->with('user', $user)
			->with('applications', $applications)
			->with('courses', $courses)
			->with('students', $students)
			->with('notifications', $unreadNotifications);
	}


	// Courses Dashboard
	public function showCoursesDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$courses = Course::all();
		$courseTypes = CourseType::all();
		$unreadNotifications = $user->notifications()->unread()->get();

		return View::make('dashboards.courses')
			->with('user', $user)
			->with('courses', $courses)
			->with('courseTypes', $courseTypes)
			->with('notifications', $unreadNotifications);
			// ->with('students', $students);
	}


	// Users Dashboard
	public function showUsersDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::orderBy('id', 'DESC')->paginate(10);
		$courses = Course::orderBy('id', 'DESC')->paginate(3);
		$unreadNotifications = $user->notifications()->unread()->get();
		$students = DB::table('users')
			->where('role', '=', 'student')
			->orderBy('created_at', 'DESC')
			->paginate(5);

		return View::make('dashboards.users')
			->with('user', $user)
			->with('applications', $applications)
			->with('courses', $courses)
			->with('students', $students)
			->with('notifications', $unreadNotifications);
	}
}
