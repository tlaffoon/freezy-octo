@extends('layouts.master')

@section('topscript')
<style type="text/css">

    .course-box {
        width: 100%;
/*        height: 50px;
*/        border: dashed #eee 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }

</style>
@stop

@section('content')

<div class="col-md-12">

    <h2 class="page-header">Available Courses: </h2>

    @foreach ($courses as $course)
        @if ($course->active)
            <div class="course-box">
                <a href="" class="btn btn-lg btn-primary pull-right">Apply!</a>
                {{ $course->name }}
                <br>
                Starts on: {{ $course->start_date }}
            </div>
        @endif
    @endforeach
<hr>
</div>
@stop 

@section('bottomscript')
@stop