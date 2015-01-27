<!-- User Contact Info Modal -->
<div class="modal fade" id="infoModal_{{ $application->id}}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoModalLabel">{{ $application->user->fullname}}</h4>
      </div>
      <div class="modal-body">
        <p>{{ $application->user->phone }}</p>
        <p>{{ $application->user->email }}</p>
        <p>{{ $application->user->address }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>