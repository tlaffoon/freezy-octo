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

    .user-info {
        font-size: 18px;
    }

    .small-text {
        margin-right: 5px;
    }

    .btn-group-user-profile {
        position: relative;
        bottom: 10px;
    }

</style>
@stop

@section('content')
<div class="container">
    <div class="col-md-12">
        @if(Auth::check())
            <h2 class="page-header">Contact Information 
                <a class="pull-right" href="{{ action('UsersController@edit', $user->id) }}">
                    <small class="small-text">Edit this information</small><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a> 
            </h2>

            <div class="col-md-6">

                <p class="user-info">{{ $user->fullname }}</p>
                <p class="user-info">{{ $user->email }}</p>
                <p class="user-info">{{ $user->phone }}</p>
                <p class="user-info">{{ $user->address }}</p>

            </div>

            <div class="col-md-3">
                <!-- Google Maps Location -->
            </div>
            
            <div class="col-md-3">

                @if($user->img_path)

                    <img src="{{$user->img_path }}" class="img-responsive img-rounded">

                @else 
                
                    <div class="pull-right">
                        <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-default">
                            Upload An Image
                        </a>
                    </div>

                @endif

            </div>

        @endif
    </div>

    <div class="col-md-12">

        <h2 class="page-header">Application Status 
            <a class="pull-right" href="{{ action('ApplicationsController@create') }}">
                <small class="small-text">Submit A New Application</small><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a> 
        </h2>

        <div class="panel panel-default">

            <table class="table table-striped">
                <tr>
                    <td>
                        <!-- Check for Existing Applications -->
                        @if ($user->applications)
                            
                            @if (count($user->applications) == 1)

                                <h3>You currently have 1 active application. </h3>
                                
                            @elseif (count($user->applications) > 1)

                                <h3>You currently have {{ count($user->applications) }} active applications. </h3>

                            @else 

                                <h3>You don't have any active applications.</h3>

                            @endif


                            @foreach ($user->applications as $application)

                                <div class="col-md-12 profile-application-header">
                                    <h4> Application #{{ $application->id }} | {{ $application->course->name }}

                                        <!-- Add in tooltips to save space and allow buttons to collapse -->
                                        <div class="btn-group btn-group-user-profile pull-right">

                                            <a href="{{ action('CoursesController@show', $application->course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="View Course">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a>

                                            <!-- <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a> -->

                                            <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
                                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </h4>
                                </div>

                                <div id="application_{{$application->id}}" class="col-md-12 profile-application-box">
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
                                
                                </div> <!-- End end application block -->
                            @endforeach
                        @else
                            <p class="application-info">Main Application: <a href="{{ action('ApplicationsController@create') }}" class="btn btn-default pull-right">Incomplete</a></p>
                        @endif 

                    </td>
                </tr>
                
                <? // Perform logic check on whether or not math test submitted, then open logic test. ?>
                <tr>
                    <td>
                        <!-- <p class="application-info">Math Test: <span class="btn btn-default pull-right">Incomplete</span></p> -->
                    </td>
                </tr>

                <? // Perform logic check on whether or not logic test submitted, then open instructor interview scheduling. ?>
                <tr>
                    <td>
                        <!-- <p class="application-info">Logic Test: <span class="btn btn-default pull-right">Incomplete</span></p> -->
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- <p class="application-info">Prework Test: <span class="btn btn-default pull-right">Incomplete</span></p> -->
                    </td>
                </tr>

                <? // Jenni will schedule these. ?>
                <tr>
                    <td>
                        <!-- <p class="application-info">Instructor Interview: <span class="btn btn-default pull-right">Incomplete</span></p> -->
                    </td>
                </tr>

            </table>

        </div>

    </div>
</div>
@stop

@section('bottomscript')
<script type="text/javascript">

    // var displayButtons = $('.btn-display');

    // console.log(displayButtons);

    $(document).ready(function () {

        // Initialize tooltips
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });

        // Hide all existing application boxes.
        $('.profile-application-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            // console.log(buttonContent);

            // Change button glyphicon and text

            // console.log($(this).html());

            // if ($(this:contains).html().contains('Display')) {
            //     console.log('true');
            //     $(this).html('<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> Hide This Application');
            // };

            // $( "div:contains('John')" )
            
            $('#application_' + id).slideToggle();
            
        });
    });


    

</script>
@stop