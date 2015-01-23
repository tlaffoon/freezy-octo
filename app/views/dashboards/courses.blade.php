@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">

    #pastCoursesHeader {
        margin-top: 20px;
    }

</style>
@stop

@section('content')
    <div class="pull-right dashboard-tag">
        <h5>Courses Dashboard</h5>
    </div>

    <div class="col-md-9">
        
        <!-- Courses -->
        <h3 class="page-header">Current Courses  
            <a class="pull-right" href="{{ action('CoursesController@create') }}">
                <small class="small-text">Create a New Course</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a>
        </h3>
        @foreach ($courses as $course)
            @if ($course->status == 'active')

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->courseType->name }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Button -->
                            <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit Course">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Details">
                                <i class="fa fa-chevron-down"></i>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="course{{$course->id}}" class="col-md-12 dashboard-course-box img-rounded">

                    <p>Currently Enrolled: {{ $course->current_students }} of {{ $course->max_students }}</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>Duration: {{ $course->courseType->duration }} weeks</p>
                    <hr>
                    <p class="course-description">{{ $course->description }}</p>
                </div>
                
            @endif
        @endforeach
        <!-- End Active Courses -->

        <div class="clearfix"></div>

        <h3 id="pastCoursesHeader" class="page-header">Past Courses</h3>

        @foreach($courses as $course)
            @if ($course->status == 'inactive')

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->courseType->name }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Button -->
                            <a href="{{ action('CoursesController@edit', $course->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit Course">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Details">
                                <i class="fa fa-chevron-down"></i>
                            </a>

                        </div>
                    </h4>
                </div>

                <div id="course{{$course->id}}" class="col-md-12 dashboard-course-box img-rounded">

                    <p>Currently Enrolled: {{ $course->current_students }} of {{ $course->max_students }}</p>
                    <p>Starts on: {{ $course->start_date }}</p>
                    <p>Ends on: {{ $course->end_date }}</p>
                    <p>Demo Day on: {{ $course->demo_date }}</p>
                    <p>Duration: {{ $course->courseType->duration }} weeks</p>
                    <hr>
                    <p class="course-description">{{ $course->description }}</p>
                </div>
                
            @endif
        @endforeach

        <div class="clearfix"></div>

        <!-- Course Types -->
        <h3 class="page-header">Course Types  
            <a class="pull-right" href="{{ action('CourseTypesController@create') }}">
                <small class="small-text">Create a New Course Type</small><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
            </a>
        </h3>

        @foreach ($courseTypes as $courseType)

            <p>{{$courseType->name}}</p>

        @endforeach
    </div> <!-- End Middle Column -->
    <!-- End Past Courses -->

    <div class="col-md-3">
        <!-- Placeholder -->
    </div>



@stop

@section('bottomscript')
<script type="text/javascript">

    $(document).ready(function() {
        
        // COURSES //
        
        // Hide all existing course boxes.
        $('.dashboard-course-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            
            $('#course' + id).slideToggle();
            
        });
    })

</script>

@stop