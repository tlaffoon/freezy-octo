<!-- Course Type Edit Modal -->
<div class="modal fade" id="courseTypeEditModal_{{$courseType->id}}" tabindex="-1" role="dialog" aria-labelledby="courseTypeEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="courseTypeEditModal_{{$courseType->id}}">Edit Course Type: {{ $courseType->name }}</h4>
      </div>
      <div class="modal-body">

        {{ Form::model($courseType, array('action' => array('CourseTypesController@update', $courseType->id), 'class' => 'form', 'role' => 'form', 'method' => 'PUT' )) }}
            
            <!-- Name -->
            {{ Form::label('name', 'Course Type Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-group form-control')) }}

            <!-- Description -->
            {{ Form::label('description', 'Course Type Description') }}
            {{ Form::textarea('description', Input::old('description'), array('class' => 'form-group form-control')) }}
            
            <!-- Duration -->
            {{ Form::label('duration', 'Duration of Course Type (Weeks)') }}
            {{ Form::text('duration', Input::old('duration'), array('class' => 'form-group form-control')) }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>