
        <!-- Add Comment Modal -->
        <div class="modal fade" id="commentModal_{{ $student->id}}" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="commentModalLabel">Add a Comment: {{ $student->fullname }}</h4>
              </div>
              <div class="modal-body">

                {{ Form::open(array('action' => 'CommentsController@store')) }}

                    <!-- Note -->
                    {{ Form::label('comment', 'Comment') }}
                    {{ Form::textarea('comment', null, array('class' => 'form-group form-control' )) }}

                    {{ Form::hidden('commentable_id', $student->id) }}
                    {{ Form::hidden('commentable_type', 'student') }}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                {{ Form::close() }}

              </div>
            </div>
          </div>
        </div>