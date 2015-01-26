@extends('layouts.master')

@section('topscript')
<style type="text/css">

/*    .course-box {
        width: 100%;
        border: dashed #eee 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }*/
    .course-description {
        margin-top: 20px;
        text-indent: 25px;
        font-size: 20px;
    }

    .course-header{
        font-size: 24px;
    }

    .start-date {
        margin-right: 20px;
    }

</style>
@stop

@section('content')
<div class="container">
    <div class="col-md-12">

        <h2 class="page-header">Available Courses: </h2>

        @foreach ($courses as $course)
            @if ($course->status == 'active')
                <div class="course-box img-rounded">
                    <a href="{{ action('ApplicationsController@create') }}" class="btn btn-lg btn-primary pull-right">Apply!</a>
                    
                    <p class="course-header">{{ $course->courseType->name }} | "{{ $course->designation }}" Cohort 
                        <small class="text-muted pull-right start-date">Starts on: {{ $course->start_date }}</small>
                    </p>
                    
                    <p class="course-description">{{ $course->courseType->description }}</p>
                </div>
            @endif
        @endforeach
    <hr>
    
    </div>
</div>
@stop 

@section('bottomscript')
@stop