@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container">

    <div class="pull-right dashboard-tag">
        <h5>Courses Dashboard</h5>
    </div>

    <div class="page-header">
        <h2>Welcome {{ Auth::user()->first }}!</h2>
    </div>

    <!-- Pulse -->

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div class="col-md-8">
        
        <!-- Courses -->
        <h3 class="page-header">Active Courses</h3>
        @foreach ($courses as $course)
            @if ($course->status == 'active')

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->type }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Button -->
                            <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit Course">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Details">
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="course{{$course->id}}" class="col-md-12 dashboard-course-box img-rounded">

                    <p>Currently Enrolled: {{ $course->current_students }} of {{ $course->max_students }}</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>Duration: {{ $course->duration }} weeks</p>
                    <hr>
                    <p class="course-description">{{ $course->description }}</p>
                </div>
                
            @endif
        @endforeach
        <!-- End Courses -->

    </div> <!-- End Middle Column -->

    <div class="col-md-2">

    </div>

    <div class="col-md-8">
        <h3 class="page-header">Inactive Courses</h3>

        @foreach($courses as $course)
            @if ($course->status == 'inactive')

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->type }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Button -->
                            <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit Course">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Details">
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="course{{$course->id}}" class="col-md-12 dashboard-course-box img-rounded">

                    <p>Currently Enrolled: {{ $course->current_students }} of {{ $course->max_students }}</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>Duration: {{ $course->duration }} weeks</p>
                    <hr>
                    <p class="course-description">{{ $course->description }}</p>
                </div>
                
            @endif
        @endforeach
    </div>

</div> <!-- End Container -->
@stop

@section('bottomscript')
@stop