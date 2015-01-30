@extends('layouts.master')

@section('topscript')
<style type="text/css">

    .comment-box {
        padding: 5px;
        border: dashed #eee 1px;
    }

    .comment-body {
        margin-top: 10px;
    }

</style>
@stop

@section('content')

    <div class="container">

        <h2 class="page-header">Application Overview: {{ $application->user->fullname }}</h2>

        @if ($application)

                <div class="col-md-8 application-box">

<!--                     <div class="btn-group pull-right">

                            <a href="{{ action('ApplicationsController@show', $application->id) }}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                            
                            <a href="{{ action('ApplicationsController@edit', $application->id) }}" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="" class="deleteApp btn btn-default btn-sm" data-userid="{{ $application->id }}">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                            </a>

                    </div> -->

                    <div class="btn-group pull-right">

                        <!-- Contact Info Modal Button Trigger -->
                        <a href="#infoModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Info" data-toggle="modal" data-target="#infoModal_{{ $application->id}}">
                            <i class="fa fa-info-circle"></i>
                        </a>

                        <!-- User Edit Modal Button Trigger -->
                        <!-- <a href="" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#editModal_{{ $application->id}}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a> -->

                        <!-- Send Message Modal Button Trigger -->
                        <a href="#messageModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Send Email" data-toggle="modal" data-target="#messageModal_{{ $application->id}}">
                            <i class="fa fa-envelope-o"></i>
                        </a>

                        <!-- Make Comment Modal Button Trigger -->
                        <a href="#commentModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Add Comment" data-toggle="modal" data-target="#commentModal_{{ $application->id}}">
                            <i class="fa fa-comment-o"></i>
                        </a>

                        <a href="" class="deleteApp btn btn-default" data-userid="{{ $application->id }}">
                            <span class="glyphicon glyphicon-remove-sign"></span>
                        </a>

                        <!-- Include Modal For Contact Info -->
                        @include('partials.modals.contact')

                        <!-- Include Modal For Send Email -->
                        @include('partials.modals.message')

                        <!-- Include Modal For Comments -->
                        @include('partials.modals.add-comment')
                        
                    </div>

                    <h3 class="page-header">{{ $application->user->fullname }} | Application #{{ $application->id }}</h3>

                    @if ($application->user->img_path)
                        <div class="">
                            <img class="img-responsive" src="{{$user->img_path }}">
                        </div>
                    @endif
                    
                    <p> <strong> Submitted at: </strong> {{ $application->created_at }}</p>
                    <p> <strong> Applying to: </strong>  {{ $application->course->designation }}</p>
                    
                    <p> <strong> Phone: </strong> {{ $application->user->phone }}</p>
                    <p> <strong> Email: </strong> {{ $application->user->email }}</p>
                    <p> <strong> Address: </strong> {{ $application->user->address }}</p>

                    <p> <strong> Employment status: </strong> {{ ucfirst($application->employment_status) }}</p>
                    
                    @if ($application->resume_path)
                        <p> <strong> Link to resume: </strong> {{ $application->resume_path }}</p>
                    @else 
                        <p> <strong> Link to resume: </strong> No resume uploaded.</p>
                    @endif

                    <p> <strong> Financing: </strong> {{ ucfirst($application->financing_status) }}</p>
                    <p> <strong> Referred by: </strong> {{ ucfirst($application->referred_by) }}</p>
                    <p> <strong> Background Info: </strong> {{ $application->bg_info }}</p>
                    <p> <strong> Questions: </strong> {{ $application->questions }}</p>
                
                </div> <!-- End end application block -->

                <div class="col-md-4 comment-box">
                
                    @foreach($application->comments as $comment)
                    
                        <div class="col-sm-12">
                            <div class="text-muted pull-left">
                                {{ $comment->author->first }} 
                            </div>
                            <div class="text-muted pull-right">
                                {{ $comment->created_at }} 
                            </div>
                        </div>

                        <div class="col-sm-12 comment-body">
                            <p> {{ $comment->body }} </p>
                        </div>

                        <hr>

                    @endforeach

                </div>

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