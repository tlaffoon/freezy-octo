<!-- Course Create Modal -->
<div class="modal fade" id="createCourseTypeModal" tabindex="-1" role="dialog" aria-labelledby="createCourseTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="createCourseTypeModalLabel">Create A Course</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('action' => array('CourseTypesController@store'), 'class' => 'form', 'role' => 'form', 'method' => 'POST' )) }}
            
            <!-- Name -->
            {{ Form::label('name', 'Course Type Name') }}
            {{ Form::text('name', null, array('class' => 'form-group form-control')) }}

            <!-- Description -->
            {{ Form::label('description', 'Course Type Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-group form-control', 'placeholder' => 'A short description of this course...')) }}
            
            <!-- Duration -->
            {{ Form::label('duration', 'Duration of Course Type (Weeks)') }}
            {{ Form::text('duration', null, array('class' => 'form-group form-control')) }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>