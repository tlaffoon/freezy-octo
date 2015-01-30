<!-- Course Type Edit Modal -->
<div class="modal fade" id="applicationEdit{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="courseTypeEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="applicationEdit{{$application->id}}">Edit Application: {{ $application->user->fullname }}</h4>
      </div>
      <div class="modal-body">

        {{ Form::model($application, array('action' => array('ApplicationsController@update', $application->id), 'class' => 'form', 'role' => 'form', 'method' => 'PUT' )) }}
            
        <!-- INCOMPLETE -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>