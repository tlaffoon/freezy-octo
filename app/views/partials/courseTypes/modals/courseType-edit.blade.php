        <!-- Course Inspect Button Trigger -->
        <a href="{{ action('CourseTypesController@show', $courseType->id) }}" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Inspect">
            <i class="fa fa-search"></i>
        </a>

        <!-- Course Type Edit Modal Button Trigger -->
        <a href="#courseTypeEditModal" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#courseTypeEditModal_{{$courseType->id}}">
            <i class="fa fa-pencil-square-o"></i>
        </a>

        <!-- Include Course Type Edit Modal -->
        @include('partials.courseTypes.modals.courseType-edit')

        <!-- Course Toggle Display Button -->
        <a id="{{$courseType->id}}" href="" class="btn btn-default btn-sm courseType-btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
            <i class="fa fa-chevron-down"></i>
        </a>