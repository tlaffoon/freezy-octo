@extends('layouts.master')

@section('topscript')
@stop

@section('content')

<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4">

            <h2 class="page-header">Create A Course</h2>

        {{ Form::open(array('action' => array('CoursesController@store'), 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}

            <!-- Type -->
            {{ Form::label('type', 'Type') }}
            {{ Form::select('type', $course_type_list, null, array('class' => 'form-group form-control')) }}

            <!-- Start Date -->
            <label for="start_date">Start Date</label>
            <input id="start_date" name="start_date" type="date" class="form-group form-control">

            <!-- End Date -->
            <label for="end_date">End Date</label>
            <input id="end_date" name="end_date" type="date" class="form-group form-control">

            <!-- Demo Date -->
            <label for="demo_date">Demo Date (optional)</label>
            <input id="demo_date" name="demo_date" type="date" class="form-group form-control">            

            <!-- Max Students -->
            {{ Form::label('max_students', 'Max Number of Students') }}
            {{ Form::text('max_students', Input::old('max_students'), array('class' => 'form-group form-control')) }}
            
            <!-- Cost of Tuition -->
            {{ Form::label('cost', 'Cost of Tuition') }}
            {{ Form::text('cost', Input::old('cost'), array('class' => 'form-group form-control')) }}

            {{ Form::submit('Create Course', array('class' => 'btn btn-success btn-block')) }}

        {{ Form::close() }}

        </div>
    </div>
</div>


@stop

@section('bottomscript')
@stop