@extends('layouts.master')

@section('topscript')
<style type="text/css">
    .user-info {
        font-size: 18px;
    }

    #small-text {
        margin-right: 5px;
    }
/*    .application-info {
        font-size: 18px;
    }*/
</style>
@stop

@section('content')
<div class="container">
    <div class="col-md-12">
        @if(Auth::check())
            
            <h2 class="page-header">Contact Information <a class="pull-right" href="{{ action('UsersController@edit', $user->id) }}"><small id="small-text">Edit this information</small><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> </h2>

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

                    <img src="{{$user->img_path }}" class="img-responsive img-rounded pull-right">

                @else 
                
                    <div class="pull-right">
                        <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-default">Upload An Image</a>
                    </div>

                @endif

            </div>

        @endif
    </div>

    <div class="col-md-12">

        <h2 class="page-header">Application Status</h2>

        <div class="panel panel-default">

            <table class="table table-striped">
                
                <? // Perform logic check on whether or not initial application submitted, then open math test. ?>
                <tr>
                    <td>

                        @if ($user->application_completed)
                            <p class="application-info">Main Application: <a href="{{ action('ApplicationsController@show', $user->application) }}" class="btn btn-default btn-success pull-right">Completed</a></p>
                        @else
                            <p class="application-info">Main Application: <a href="{{ action('ApplicationsController@create') }}" class="btn btn-default pull-right">Incomplete</a></p>
                        @endif 

                    </td>
                </tr>
                
                <? // Perform logic check on whether or not math test submitted, then open logic test. ?>
                <tr>
                    <td>
                        <p class="application-info">Math Test: <span class="btn btn-default pull-right">Incomplete</span></p>
                    </td>
                </tr>

                <? // Perform logic check on whether or not logic test submitted, then open instructor interview scheduling. ?>
                <tr>
                    <td>
                        <p class="application-info">Logic Test: <span class="btn btn-default pull-right">Incomplete</span></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="application-info">Prework Test: <span class="btn btn-default pull-right">Incomplete</span></p>
                    </td>
                </tr>

                <? // Jenni will schedule these. ?>
                <tr>
                    <td>
                        <p class="application-info">Instructor Interview: <span class="btn btn-default pull-right">Incomplete</span></p>
                    </td>
                </tr>

            </table>

        </div>

    </div>
</div>
@stop