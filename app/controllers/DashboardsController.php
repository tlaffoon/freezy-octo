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
		$courses = Course::orderBy('id', 'DESC');
		// $course_list = array('' => 'Select Course') + Course::where('status', '=', 'active')->lists('designation', 'id');
		$course_list = Course::where('status', '=', 'active')->lists('designation', 'id');

		$students = DB::table('users')->where('role', '=', 'user')->get();
		$unreadNotifications = $user->notifications()->unread()->get();

		$pendingApplications = Application::where('status', '=', 'pending')->orderBy('id', 'DESC')->paginate(10);
		$approvedApplications = Application::where('status', '=', 'approved')->orderBy('id', 'DESC')->paginate(10);
		$deniedApplications = Application::where('status', '=', 'denied')->orderBy('id', 'DESC')->paginate(10);

		return View::make('dashboards.applications')
			->with('user', $user)
			->with('pendingApplications', $pendingApplications)
			->with('approvedApplications', $approvedApplications)
			->with('deniedApplications', $deniedApplications)
			->with('courses', $courses)
			->with('course_list', $course_list)
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
		$course_type_list = array('' => 'Select Course Type') + CourseType::lists('name', 'id');
		$unreadNotifications = $user->notifications()->unread()->get();

		return View::make('dashboards.courses')
			->with('user', $user)
			->with('courses', $courses)
			->with('courseTypes', $courseTypes)
			->with('course_type_list', $course_type_list)
			->with('notifications', $unreadNotifications);
	}

	// Course Overview
	public function showCourseOverview($id) {
		
		$user = User::find(Auth::id());
		$course = Course::find($id);
		$comments = Comment::where('commentable_id', '=', '2')->where('commentable_type', '=', 'course')->get();
		// $course = Course::with('comments')->where('id', '=', $id)->get();
		$unreadNotifications = $user->notifications()->unread()->get();

		return View::make('courses.overview')
			->with('user', $user)
			->with('course', $course)
			->with('comments', $comments)
			->with('notifications', $unreadNotifications);
	}

	// Users Dashboard
	public function showUsersDashboard()
	{
		$id = Auth::id();
		$user = User::findOrFail($id);
		$applications = Application::orderBy('id', 'DESC')->paginate(10);
		$courses = Course::orderBy('id', 'DESC')->paginate(3);
		$unreadNotifications = $user->notifications()->unread()->get();
		
		$students = User::where('role', '=', 'student')
			->orderBy('created_at', 'DESC')
			->paginate(10);

		// $students = DB::table('users')
		// 	->where('role', '=', 'student')
		// 	->orderBy('created_at', 'DESC')
		// 	->paginate(10);

		return View::make('dashboards.users')
			->with('user', $user)
			->with('applications', $applications)
			->with('courses', $courses)
			->with('students', $students)
			->with('notifications', $unreadNotifications);
	}
}
