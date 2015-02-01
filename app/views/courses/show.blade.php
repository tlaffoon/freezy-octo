@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container">
    <div class="col-md-12">
        <h2 class="page-header">{{ $course->designation }} </h2>
    </div>
        <div class="col-md-12 course-box img-rounded">
        
            <div class="col-md-11">
                <p class="course-header">{{ $course->courseType->name }} | "{{ $course->designation }}" Cohort 
                    <small class="text-muted pull-right start-date">Starts on: {{ $course->start_date }}</small>
                </p>
                
            </div>

            <div class="col-md-1">
                @if ($course->status == 'active')
                    <a href="{{ action('ApplicationsController@create') }}" class="btn btn-lg btn-primary pull-right">Apply!</a>
                @endif
            </div>

            <div class="col-md-11">
                <p class="course-description">{{ $course->courseType->description }}</p>
            </div>

            <div class="col-md-1">
                <!--  -->
            </div>

        </div>
    <hr>
</div>
@stop

@section('bottomscript')
@stop