            <div class="modal fade" id="messageModal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="messageModalLabel">Send An Email</h4>
                  </div>
                  <div class="modal-body">

                    {{ Form::open(array('url' => '/sendMail')) }}

                        <!-- Applicant Email -->
                        {{ Form::label('name', 'Applicant Name') }}
                        {{ Form::text('name', $application->user->fullname, array('class' => 'form-group form-control' )) }}

                        <!-- Applicant Email -->
                        {{ Form::label('email', 'Applicant Email') }}
                        {{ Form::text('email', $application->user->email, array('class' => 'form-group form-control' )) }}

                        <!-- Subject -->
                        {{ Form::label('subject', 'Subject') }}
                        {{ Form::text('subject', $application->course->designation, array('class' => 'form-group form-control' )) }}

                        <!-- Message -->
                        {{ Form::label('messageContents', 'Message') }}
                        {{ Form::textarea('messageContents', null, array('class' => 'form-group form-control' )) }}

                        {{ Form::hidden('user_id', $application->user->id) }}
                        {{ Form::hidden('application_id', $application->id) }}

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        
                        {{ Form::submit('Send', array('class' => 'btn btn-primary pull-right')) }}
                    {{ Form::close() }}

                  </div>
                </div>
              </div>
            </div>