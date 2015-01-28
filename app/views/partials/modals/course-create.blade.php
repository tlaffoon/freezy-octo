
<!-- User Contact Info Modal -->
<div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog" aria-labelledby="createCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="createCourseModalLabel">Create A Course</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('action' => array('CoursesController@store'), 'method' => 'POST' )) }}

            <!-- Type -->
            {{ Form::label('type', 'Type') }}
            {{ Form::select('type', $course_type_list, null, array('class' => 'form-group form-control')) }}
            
            <!-- Designation -->
            {{ Form::label('designation', 'Cohort Designation') }}
            {{ Form::text('designation', null, array('class' => 'form-group form-control')) }}

            <!-- Start Date -->
            <label for="start_date">Start Date</label>
            <input id="start_date" name="start_date" type="date" class="form-group form-control">

            <!-- End Date -->
            <label for="end_date">End Date</label>
            <input id="end_date" name="end_date" type="date" class="form-group form-control">

            <!-- Demo Date -->
            <label for="demo_date">Demo Date (optional)</label>
            <input id="demo_date" name="demo_date" type="date" class="form-group form-control">            

            <!-- Max Students -->
            {{ Form::label('max_students', 'Max Number of Students') }}
            {{ Form::text('max_students', null, array('class' => 'form-group form-control')) }}
            
            <!-- Cost of Tuition -->
            {{ Form::label('cost', 'Cost of Tuition') }}
            {{ Form::text('cost', null, array('class' => 'form-group form-control')) }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            {{ Form::submit('Create Course', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>