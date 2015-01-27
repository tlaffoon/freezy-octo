<!-- <div class="modal fade" id="messageModal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Send me a message</h3>
    </div>
    <div class="modal-body">
        <form class="contact" name="contact">
            <label class="label" for="name"> Applicant Name </label><br>
            <input type="text" name="name" class="input-xlarge"><br>
            <label class="label" for="email"> Applicant Email </label><br>
            <input type="email" name="email" class="input-xlarge" value="{{ $application->user->email }}"><br>
            <label class="label" for="message">Enter a Message</label><br>
            <textarea name="message" class="input-xlarge"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" value="Send!" id="submit_{{ $application->id}}">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>
</div>
<div id="thanks"><p><a data-toggle="modal" href="#form-content" class="btn btn-primary btn-large">Modal powers, activate!</a></p></div> -->


            <div class="modal fade" id="messageModal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="messageModalLabel">{{ $application->user->fullname}}</h4>
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
                        {{ Form::hidden('application_id'), $application->id }}

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        
                        {{ Form::submit('Send', array('class' => 'btn btn-primary pull-right')) }}
                    {{ Form::close() }}

                  </div>
                </div>
              </div>
            </div>