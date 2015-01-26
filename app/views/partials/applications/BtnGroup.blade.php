<div class="btn-group btn-group-dashboard pull-right">

    <!-- User Contact Info Modal Button Trigger -->
    <a href="#myModal" class="btn btn-default" role="button" rel="tooltip" data-original-title="Contact Info" data-toggle="modal" data-target="#modal_{{ $application->id}}">
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
    </a>

    <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Make A Note">
        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
    </a>

    <a id="{{$application->id}}" href="" class="btn btn-default btn-display" data-toggle="tooltip" data-placement="top" title="Show/Hide Application">
        <i class="fa fa-chevron-down"></i>
    </a>
</div>