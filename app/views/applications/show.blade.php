@extends('layouts.master')

@section('css')
    .contact-info {
        height: 200px; 
        width: 200px;
        border: dotted #eee 1px;
        float: right;
    }
    .btn-box {
        <!-- position: relative; -->
        <!-- top: 0px; -->
        <!-- right: 0px; -->
    }
@stop

@section('content')

    <div class="container">

        <h2 class="page-header">Application Index Page</h2>

        @if ($application)

                <div class="col-md-12 application-box">

                    <div class="btn-group pull-right">

                            <a href="{{ action('ApplicationsController@show', $application->id) }}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                            
                            <a href="{{ action('ApplicationsController@edit', $application->id) }}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="" class="deleteApp btn btn-default btn-sm" data-userid="{{ $application->id }}">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                            </a>

                    </div>

                    <h3 class="page-header">{{ $application->user->fullname }} | Application #{{ $application->id }}</h3>

                    @if ($application->user->img_path)
                        <div class="">
                            <img class="img-responsive" src="{{$user->img_path }}">
                        </div>
                    @endif
                    
                    <p> <strong> Submitted at: </strong> {{ $application->created_at }}</p>
                    <p> <strong> Applying to: </strong>  {{ $application->course->name }}                              </p>
                    
                    <p> <strong> Phone: </strong> {{ $application->user->phone }}     </p>
                    <p> <strong> Email: </strong> {{ $application->user->email }}     </p>
                    <p> <strong> Address: </strong> {{ $application->user->address }}    </p>

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

    @endif

    {{ Form::open(array('action' => 'ApplicationsController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
    {{ Form::close() }}

@stop

@section('bottomscript')

<script type="text/javascript">
    $(".deleteApp").click(function() {
        var userID = $(this).data('userid');
        $("#deleteForm").attr('action', '/users/' + userID);
        if (confirm("Are you sure you want to delete this user?")) {
            $('#deleteForm').submit();
        }
    });
</script>

@stop