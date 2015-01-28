<div class="btn-group btn-group-dashboard pull-right">

    <!-- User Contact Info Modal Button Trigger -->
    <a href="#infoModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Info" data-toggle="modal" data-target="#infoModal_{{ $application->id}}">
        <i class="fa fa-info-circle"></i>
    </a>

    <!-- User Edit Modal Button Trigger -->
    <a href="#editModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#editModal_{{ $application->id}}">
        <i class="fa fa-pencil-square-o"></i>
    </a>

    <!-- User Send Message Modal Button Trigger -->
    <a href="#messageModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Send Email" data-toggle="modal" data-target="#messageModal_{{ $application->id}}">
        <i class="fa fa-envelope-o"></i>
    </a>

    <!-- User Make Note Modal Button Trigger -->
    <a href="#noteModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Make A Note" data-toggle="modal" data-target="#noteModal_{{ $application->id}}">
        <i class="fa fa-comment-o"></i>
    </a>

    <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Toggle">
        <i class="fa fa-chevron-down"></i>
    </a>
    
</div>