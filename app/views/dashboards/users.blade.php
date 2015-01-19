@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">
/*    .student-box {
        height: 170px;
        margin-bottom: 10px;
        padding: 10px;
        border: dashed #eee 1px;
    }
    .student-name {
        font-size: 18px;
    }
    .student-info {
        font-size: 16px;
    }
    .btn-select {
        margin-left: 50px;
        margin-right: 50px;
        margin-bottom: 10px;
    }
    .search-form {
        height: 120px;
        border: dashed #eee 1px;
        margin-bottom: 10px;
    }*/
</style>
@stop

@section('content')


    <div class="pull-right dashboard-tag">
        <h5>Users Dashboard</h5>
    </div>
  

    <div class="col-md-9 column">
        
        @if ($students)

        <h3 class="page-header"> Students </h3>

        <!-- Students -->
            @foreach ($students as $key => $student)

                <div class="col-md-12 dashboard-user-header img-rounded">
                    <h4> {{ $student->fullname }}

                        <div class="btn-group btn-group-dashboard pull-right">


                            <a href="{{ action('UsersController@show', $student->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Show User Profile">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </a>
                            
                            <a href="{{ action('UsersController@edit', $student->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit User">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Make A Note">
                                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            </a>

                            <a id="{{$student->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
                                <i class="fa fa-chevron-down"></i>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="student{{$student->id}}" class="col-md-12 dashboard-user-box img-rounded">

                    <a href="" class="deleteUser btn btn-danger pull-right" data-userid="{{$student->id}}" data-toggle="tooltip" data-placement="top" title="Delete Student">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </a>

                    <p class="student-name">{{ $student->fullname }}</p>
                    <p class="student-info">{{ $student->email }}</p>
                    <p class="student-info">{{ $student->phone }}</p>
                    <p class="student-info">{{ $student->street . " " . $student->city . " " . $student->state . " " . $student->zip }}</p>

                </div>
                    
            @endforeach
        
        <!-- End Students -->

        <div class="text-center">
            {{ $students->links() }}
        </div>

        @endif

    </div> <!-- End Column -->

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