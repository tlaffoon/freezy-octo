<div class="btn-group btn-group-dashboard pull-right">

    <!-- User Contact Info Modal Button Trigger -->
    <a href="#infoModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Contact Info" data-toggle="modal" data-target="#infoModal_{{ $application->id}}">
        <i class="fa fa-info-circle"></i>
    </a>

    <!-- User Send Message Modal Button Trigger -->
    <a href="#messageModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Send A Message" data-toggle="modal" data-target="#messageModal_{{ $application->id}}">
        <i class="fa fa-envelope-o"></i>
    </a>

    <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Make A Note">
        <i class="fa fa-comment-o"></i>
    </a>

    <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
        <i class="fa fa-chevron-down"></i>
    </a>
    
</div>