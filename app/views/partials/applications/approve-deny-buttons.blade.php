<div class="pull-right">
    {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
        {{ Form::hidden('id', $application->id) }}
        {{ Form::hidden('deny', true) }}
        {{ Form::button('<i class="fa fa-thumbs-o-down"></i>', array('type' => 'submit', 'class' => 'btn btn-default denyBtn'))}}
    {{ Form::close() }}
</div>

<div class="pull-right">
    {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
        {{ Form::hidden('id', $application->id) }}
        {{ Form::hidden('approve', true) }}
        {{ Form::button('<i class="fa fa-thumbs-o-up"></i>', array('type' => 'submit', 'class' => 'btn btn-default approveBtn'))}}
    {{ Form::close() }}
</div>