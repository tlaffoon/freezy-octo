        <!-- Edit User Modal -->
        <div class="modal fade" id="noteModal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="noteModalLabel">Add a Note: {{ $application->user->fullname }}</h4>
              </div>
              <div class="modal-body">

                {{ Form::open(array('action' => 'NotesController@create')) }}

                    <!-- Note -->
                    {{ Form::label('note', 'Note') }}
                    {{ Form::textarea('note', null, array('class' => 'form-group form-control' )) }}

                    {{ Form::hidden('user_id', $application->user->id) }}
                    {{ Form::hidden('application_id', $application->id) }}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                {{ Form::close() }}

              </div>
            </div>
          </div>
        </div>