@extends('layouts.master')

@section('topscript')
<style type="text/css">

    .course-box {
        width: 100%;
        border: dashed #eee 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }

</style>
@stop

@section('content')
<div class="container">
    <div class="col-md-12">

        <h2 class="page-header">Available Courses: </h2>

        @foreach ($courses as $course)
            @if ($course->active)
                <div class="course-box img-rounded">
                    <a href="{{ action('ApplicationsController@create') }}" class="btn btn-lg btn-primary pull-right">Apply!</a>
                    <p>{{ $course->type }} | "{{ $course->designation }}" Cohort</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>{{ $course->description }}</p>
                </div>
            @endif
        @endforeach
    <hr>
    
    </div>
</div>
@stop 

@section('bottomscript')
@stop