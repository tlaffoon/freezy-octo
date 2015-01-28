@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">

    #pastCoursesHeader {
        margin-top: 20px;
    }

</style>
@stop

@section('content')

    <div class="col-md-12">
        <div class="pull-right dashboard-tag">
            <h5>Courses Dashboard</h5>
            <a href="/courses"> View All Courses </a>
        </div>
    </div>

    <div class="col-md-6">
        
        <!-- Courses -->
        <h3 class="page-header">Current Courses  

            <!-- Course Create Modal Button Trigger -->
            <a href="#createCourseModal" class="pull-right" role="button" rel="tooltip" data-original-title="" data-toggle="modal" data-target="#createCourseModal">
                <small class="small-text">Create a New Course</small><i class="fa fa-plus-square-o"></i>
            </a>

        </h3>

        <!-- Include Course Create Modal -->
        @include('partials.modals.course-create')
        
        @foreach ($courses as $course)
            @if ($course->status == 'active')

                <div class="col-md-12 dashboard-course-header img-rounded">
                    <h4> {{ $course->courseType->name }}: "{{ $course->designation }}"

                        <div class="btn-group btn-group-dashboard pull-right">

                            <!-- Course Edit Modal Button Trigger -->
                            <a href="#courseEditModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#courseEditModal_{{ $course->id}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <!-- Include Course Edit Modal -->
                            @include('partials.modals.course-edit')
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default course-btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
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
                    <p class="course-description">{{ $course->courseType->description }}</p>
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

                            <!-- Course Edit Modal Button Trigger -->
                            <a href="#courseEditModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#courseEditModal_{{ $course->id}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <!-- Include Course Edit Modal -->
                            @include('partials.modals.course-edit')
                            
                            <!-- Course Toggle Display Button -->
                            <a id="{{$course->id}}" href="" class="btn btn-default course-btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
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
                    <p class="course-description">{{ $course->courseType->description }}</p>
                </div>
                
            @endif
        @endforeach

        <div class="clearfix"></div>

    <!-- End Past Courses -->
    </div>
    
    <div class="col-md-6">
            <!-- Course Types -->
        <h3 class="page-header">Course Types

            <!-- Course Create Modal Button Trigger -->
            <a href="#createCourseTypeModal" class="pull-right" role="button" rel="tooltip" data-original-title="" data-toggle="modal" data-target="#createCourseTypeModal">
                <small class="small-text">Create a New Course Type</small><i class="fa fa-plus-square-o"></i>
            </a>

        </h3>

        <!-- Course Type Create Modal -->
        @include('partials.modals.course-type-create')

        @foreach ($courseTypes as $courseType)
            <div class="col-md-12 dashboard-course-header img-rounded">
                <h4> {{ $courseType->name }}

                    <div class="btn-group btn-group-dashboard pull-right">

                        <!-- Course Type Edit Modal Button Trigger -->
                        <a href="#courseTypeEditModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#courseTypeEditModal_{{ $course->id}}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <!-- Include Course Type Edit Modal -->
                        @include('partials.modals.course-edit')

                        <!-- Course Toggle Display Button -->
                        <a id="{{$courseType->id}}" href="" class="btn btn-default courseType-btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
                            <i class="fa fa-chevron-down"></i>
                        </a>

                    </div>
                </h4>
            </div>

            <div id="courseType{{$courseType->id}}" class="col-md-12 dashboard-course-box img-rounded">

                <p>Duration: {{ $courseType->duration }} weeks</p>
                <hr>
                <p class="course-description">{{ $courseType->description }}</p>
            </div>

        @endforeach
    </div>
@stop

@section('bottomscript')
<script type="text/javascript">

    $(document).ready(function() {
        
        // COURSES //
        
        // Hide all existing course boxes.
        $('.dashboard-course-box').hide();

        // Target display buttons and add event listener.
        $('.course-btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            console.log(id);
            var buttonContent = $(this).html();
            
            $('#course' + id).slideToggle();
            
        });

        // Target display buttons and add event listener.
        $('.courseType-btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            console.log(id);
            var buttonContent = $(this).html();
            
            $('#courseType' + id).slideToggle();
            
        });
    });

</script>

@stop