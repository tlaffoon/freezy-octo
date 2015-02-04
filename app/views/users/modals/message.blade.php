<div class="modal fade" id="messageModal_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
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
            {{ Form::text('name', $student->fullname, array('class' => 'form-group form-control' )) }}

            <!-- Applicant Email -->
            {{ Form::label('email', 'Applicant Email') }}
            {{ Form::text('email', $student->email, array('class' => 'form-group form-control' )) }}

            <!-- Subject -->
            {{ Form::label('subject', 'Subject') }}
            {{ Form::text('subject', null, array('class' => 'form-group form-control' )) }}

            <!-- Message -->
            {{ Form::label('messageContents', 'Message') }}
            {{ Form::textarea('messageContents', null, array('class' => 'form-group form-control' )) }}

            {{ Form::hidden('student_id', $student->id) }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            {{ Form::submit('Send', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}

      </div>
    </div>
  </div>
</div>