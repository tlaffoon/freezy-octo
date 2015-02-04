<div class="btn-group btn-group-dashboard pull-right">

    <!-- Contact Info Modal Button Trigger -->
    <a href="#infoModal" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Info" data-toggle="modal" data-target="#infoModal_{{ $application->id}}">
        <i class="fa fa-info-circle"></i>
    </a>

    <!-- User Edit Modal Button Trigger -->
    <!-- <a href="" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#editModal_{{ $application->id}}">
        <i class="fa fa-pencil-square-o"></i>
    </a> -->


    <!-- Application Inspect Button Trigger -->
    <a href="{{ action('ApplicationsController@show', $application->id) }}" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Inspect Application">
        <i class="fa fa-search"></i>
    </a>

    <!-- Send Message Modal Button Trigger -->
    <a href="#messageModal" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Send Email" data-toggle="modal" data-target="#messageModal_{{ $application->id}}">
        <i class="fa fa-envelope-o"></i>
    </a>

    <!-- Make Comment Modal Button Trigger -->
    <a href="#commentModal" class="btn btn-default btn-sm" role="button" rel="tooltip" data-original-title="Add Comment" data-toggle="modal" data-target="#commentModal_{{ $application->id}}">
        <i class="fa fa-comment-o"></i>
    </a>

    <a id="{{$application->id}}" href="" class="btn btn-default btn-display btn-sm" data-toggle="tooltip" data-placement="top" title="Toggle">
        <i class="fa fa-chevron-down"></i>
    </a>
    
</div>