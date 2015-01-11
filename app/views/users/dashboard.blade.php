@extends('layouts.master')

@section('topscript')
<style type="text/css">
    .profile-application-header {
        border: solid #eee 1px;
        padding-top: 5px;
        background-color: white;
    }

    .profile-application-box {
        border: solid #eee 1px;
        padding-top: 5px;
        margin-bottom: 10px;
        background-color: white;
    }

    .btn-group-user-profile {
        position: relative;
        bottom: 10px;
    }

    .sidebar-btn {
        margin: 5px;
    }
</style>
@stop

@section('content')

<div class="container">

    <div class="page-header">
        <h2>Welcome {{ Auth::user()->first }}!</h2>
    </div>

    <!-- Dashboard Sidebar -->
    <div class="col-md-2">
        <h3 class="page-header">Sidebar</h3>
            <a href="" class="btn btn-default sidebar-btn"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Applications</a>
            <a href="" class="btn btn-default sidebar-btn"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Courses</a>
            <a href="" class="btn btn-default sidebar-btn"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Users</a>
    </div>

    <div class="col-md-8">
        
        <!-- Courses -->
        <h3 class="page-header">Courses
            <a class="pull-right" href="{{ action('CoursesController@create') }}">
                <small class="small-text">Create A New Course</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a> 
        </h3>
        @foreach ($courses as $course)
            @if ($course->active)
                <div class="course-box img-rounded">
                    <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="top" title="Edit Course"><span class="glyphicon glyphicon-edit"></span></a>
                    {{ $course->name }}
                </div>
            @endif
        @endforeach
        <!-- End Courses -->


        <!-- Applications -->
        <h3 class="page-header">Applications (Pending)
            <a class="pull-right" href="{{ action('ApplicationsController@index') }}">
                <small class="small-text">View All Applications</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a> 
        </h3>
        <div class="panel panel-default">
            <table class="table table-striped">
                <tr>
                    <td>
                        @foreach ($applications as $application)
                        <!-- Begin Individual Application Block -->
                            
                            @if ($application->status == 'pending')
                            <div class="col-md-12 profile-application-header">
                                <h4> {{ $application->user->fullname }} | Application #{{ $application->id }}

                                    <div class="btn-group btn-group-user-profile pull-right">

                                        <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Contact">
                                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                        </a>

                                        <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Comment">
                                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                                        </a>

                                        <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
                                            <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </h4>
                            </div>

                            <div id="application_{{$application->id}}" class="col-md-12 profile-application-box">
                                
                                <div class="btn-group pull-right">
                                    <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Approve">
                                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                    </a>
                                    <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Deny">
                                        <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <p> <strong> Submitted at: </strong> {{ $application->created_at }}</p>
                                <p> <strong> Applying to: </strong>  {{ $application->course->name }}                      </p>

                                <p> <strong> Employment status: </strong> {{ ucfirst($application->employment_status) }}   </p>
                                
                                @if ($application->resume_path)
                                    <p> <strong> Link to resume: </strong> {{ $application->resume_path }} </p>
                                @else 
                                    <p> <strong> Link to resume: </strong> No resume uploaded. </p>
                                @endif

                                <p> <strong> Financing: </strong> {{ ucfirst($application->financing_status) }}            </p>
                                <p> <strong> Referred by: </strong> {{ ucfirst($application->referred_by) }}               </p>
                                <p> <strong> Background Info: </strong> {{ $application->bg_info }}                        </p>
                                <p> <strong> Questions: </strong> {{ $application->questions }}                            </p>
                            
                            </div>
                            @endif
                        <!-- End Individual Application Block -->
                        @endforeach
                    </td>
                </tr>
            </table>
        </div> <!-- End Panel -->
        <!-- End Applications -->

        <!-- Users -->
        <h3 class="page-header">Users
            <a class="pull-right" href="{{ action('UsersController@index') }}">
                <small class="small-text">View All Users</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a>
        </h3>

        @foreach ($students as $student)
            <p>{{ $student->fullname }}</p>
        @endforeach

    </div> <!-- End Column -->

    <div class="col-md-2">
        <h3 class="page-header">
            ...
        </h3>
        <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>




</div>



<!-- Admin Dashboard

    // Courses by next upcoming start date
        // Applications to those courses



    Needs to see recent applications, sorted by most recently submitted.

    Ability to add new cohorts to the application
    Ability to create tests/questions/modify existing
    Ability to view granular view on particular application w/test scores.

    Ability to see financial data summary.  Granular financial view for user.

    Ability to see analytics data on applicants.


 -->
@stop

@section('bottomscript')
@stop