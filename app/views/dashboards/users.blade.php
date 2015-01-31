@extends('layouts.dashboard')

@section('topscript')
@stop

@section('content')

    <div class="col-md-12">
        <div class="pull-right dashboard-tag">
            <h5>Users Dashboard</h5>
            <a href="{{ action('UsersController@index') }}">View All Users</a>
        </div>
    </div>
  

    <div class="col-md-6 column">
        
        @if ($students)

        <h3 class="page-header"> Students 
            <a class="pull-right" href="{{ action('UsersController@create') }}">
                <small class="small-text">Create a New Student</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a>
        </h3>

        <!-- Students -->
            @foreach ($students as $key => $student)

                <div class="col-md-12 dashboard-user-header img-rounded">
                    <h4> {{ $student->fullname }}
                        
                        @include('partials.users.dashboard-buttons')
                    
                    </h4>

                </div>

                <div id="student{{$student->id}}" class="col-md-12 dashboard-user-box img-rounded">

<!--                <a href="" class="deleteUser btn btn-danger pull-right" data-userid="{{$student->id}}" data-toggle="tooltip" data-placement="top" title="Delete Student">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </a> -->

                    <p class="student-name">{{ $student->fullname }}</p>
                    <p class="student-info">{{ $student->email }}</p>
                    <p class="student-info">{{ $student->phone }}</p>
                    <p class="student-info">{{ $student->street . " " . $student->city . " " . $student->state . " " . $student->zip }}</p>

                    <!-- Comments -->
                    @foreach($student->comments as $comment)

                        <div class="col-sm-12 comment-header">
                            <div class="text-muted pull-left">
                                {{ $comment->author->first }} said:
                            </div>

                            <div class="col-sm-12 comment-body">
                                <p> {{ $comment->body }} </p>
                            </div>
                        </div>

                        <div class="col-sm-12 timestamp">
                            <div class="text-muted pull-right">
                                on {{ $comment->created_at }} 
                            </div>
                        </div>

                    @endforeach

                </div>

                <!-- Include Modal For Contact Info -->
                @include('partials.users.modals.contact')

                <!-- Include Modal For Send Email -->
                @include('partials.users.modals.message')

                <!-- Include Modal For Add Comments -->
                @include('partials.users.modals.add-comment')
                    
            @endforeach
        
        <!-- End Students -->

        <div class="text-center">
            {{ $students->links() }}
        </div>

        @endif

    </div> <!-- End Column -->

    <div class="col-md-6">

        <!-- Placeholder -->

    </div>

@stop

@section('bottomscript')
<script type="text/javascript">

    $(document).ready(function() {
        // Users //

        // Hide all existing application boxes.
        $('.dashboard-user-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            
            $('#student' + id).slideToggle();
            
        });
    });


</script>
@stop