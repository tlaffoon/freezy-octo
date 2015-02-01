@extends('layouts.master')

@section('topscript')
<style type="text/css">

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
    </div>

        @foreach ($courses as $course)
            @if ($course->status == 'active')

            <div class="col-md-12 course-box img-rounded">
            
                <div class="col-md-11">
                    <p class="course-header">{{ $course->courseType->name }} | "{{ $course->designation }}" Cohort 
                        <small class="text-muted pull-right start-date">Starts on: {{ $course->start_date }}</small>
                    </p>
                    
                </div>

                <div class="col-md-1">
                    <a href="{{ action('ApplicationsController@create') }}" class="btn btn-lg btn-primary pull-right">Apply!</a>
                </div>

                <div class="col-md-11">
                    <p class="course-description">{{ $course->courseType->description }}</p>
                </div>

                <div class="col-md-1">
                    <!--  -->
                </div>

            </div>
            @endif
        @endforeach
    <hr>
</div>
@stop 

@section('bottomscript')
@stop