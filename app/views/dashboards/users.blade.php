@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">
    .student-box {
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
    }
</style>
@stop

@section('content')


    <div class="pull-right dashboard-tag">
        <h5>Users Dashboard</h5>
    </div>
  

    <div class="col-md-9 column">
        
        @if ($students)

        <h3 class="page-header"> Active Students </h3>

            @foreach ($students as $key => $student)
                <div class="col-md-12 student-box ">
                    <div class="btn-group pull-right">

                        <a href="{{ action('UsersController@show', $student->id) }}" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                        
                        <a href="{{ action('UsersController@edit', $student->id) }}" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="" class="deleteUser btn btn-default btn-sm" data-userid="{{$student->id}}">
                            <span class="glyphicon glyphicon-remove-sign"></span>
                        </a>
                    </div>

                    <div class="student-details">

                        <p class="student-name">{{ $student->fullname }}</p>
                        <p class="student-info">{{ $student->email }}</p>
                        <p class="student-info">{{ $student->phone }}</p>
                        <p class="student-info">{{ $student->street . " " . $student->city . " " . $student->state . " " . $student->zip }}</p>
                        <p class="student-info">{{ $student->age }}</p>

                    </div>
                </div> <!-- End Student Box -->
            @endforeach

            <div class="text-center">
                {{ $students->links() }}
            </div>

        @endif

    </div> <!-- End Column -->

@stop

@section('bottomscript')
@stop