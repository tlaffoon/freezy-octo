@extends('layouts.master')

@section('topscript')
<style type="text/css">
    .dashboard-application-header {
        border: solid #eee 1px;
        padding-top: 5px;
        background-color: white;
    }

    .dashboard-application-box {
        border: solid #eee 1px;
        padding-top: 5px;
        margin-bottom: 10px;
        background-color: white;
    }

    .dashboard-course-header {
        border: solid white 1px;
        font-size: 18px;
        padding-top: 5px;
        background-color: #E1E7F9;
        margin-bottom: 2px;
    }

    .dashboard-course-box {
        background-color: #E1E7F9;
        width: 100%;
        border: solid white 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }

    .btn-group-dashboard {
        position: relative;
        bottom: 10px;
    }

    .sidebar-btn {
        margin: 5px;
    }

    .section-header {
        margin-top: 10px;
    }

    .course-description {
        text-indent: 15px;
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
            <a href="" class="btn btn-default sidebar-btn"><i class="fa fa-users"></i>  Users</a>
    </div>

    <div class="col-md-7">
        
        <!-- Courses -->
        <h3 class="page-header">Active Courses
            <a class="pull-right" href="{{ action('CoursesController@create') }}">
                <small class="small-text">Create A New Course</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a> 
        </h3>
        @foreach ($courses as $course)
            @if ($course->active)

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->name }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Button -->
                            <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit Course">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Details">
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="course{{$course->id}}" class="col-md-12 dashboard-course-box img-rounded">

                    <p>Currently Enrolled: {{ $course->current_students }} of {{ $course->max_students }}</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>Duration: {{ $course->duration }} weeks</p>
                    <hr>
                    <p class="course-description">{{ $course->description }}</p>
                </div>
                
            @endif
        @endforeach
        <!-- End Courses -->
        

        <!-- Applications -->
        <h3 class="page-header">Pending Applications
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
                            
                            @if(count($application->status == 'pending') == 0)

                                <h4> There are no pending applications. </h4>

                            @endif

                            @if ($application->status == 'pending')
                            <div class="col-md-12 dashboard-application-header">
                                <h4> {{ $application->user->fullname }} | Application #{{ $application->id }}

                                    <div class="btn-group btn-group-dashboard pull-right">

                                        <!-- User Contact Info Modal Button Trigger -->
                                        <a href="#myModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Contact Info" data-toggle="modal" data-target="#modal_{{ $application->id}}">
                                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                        </a>

                                        <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Make A Note">
                                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                                        </a>

                                        <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
                                            <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </h4>
                            </div>

                            <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">
                                
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

                        <!-- User Contact Info Modal -->
                        <div class="modal fade" id="modal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ $application->user->fullname}}</h4>
                              </div>
                              <div class="modal-body">
                                <p>{{ $application->user->phone }}</p>
                                <p>{{ $application->user->email }}</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
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

    <div class="col-md-3">
        <h3 class="page-header">
            Recent Notes
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

</div> <!-- End Container -->



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
<script type="text/javascript">

    $(document).ready(function () {

        // Initialize Modal Button Tooltip
        $("[rel='tooltip']").tooltip();

        // Hide all existing application boxes.
        $('.dashboard-application-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            
            $('#application_' + id).slideToggle();
            
        });

        // Hide all existing course boxes.
        $('.dashboard-course-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            
            $('#course' + id).slideToggle();
            
        });
    });
    
</script>
@stop