    <!-- Course Inspect Button Trigger -->
    <a href="{{ action('CoursesController@show', $course->id) }}" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Inspect">
        <i class="fa fa-search"></i>
    </a>

    <!-- Course Edit Modal Button Trigger -->
    <a href="#courseEditModal" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#courseEditModal_{{$course->id}}">
        <i class="fa fa-pencil-square-o"></i>
    </a>

    <!-- Include Course Edit Modal -->
    @include('partials.courses.modals.course-edit')

    <!-- Course Toggle Display Button -->
    <a id="{{$course->id}}" href="" class="btn btn-default btn-sm course-btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
        <i class="fa fa-chevron-down"></i>
    </a>