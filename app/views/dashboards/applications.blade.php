@extends('layouts.dashboard')

@section('topscript')
@stop

@section('content')
<div class="pull-right dashboard-tag">
    <h5>Applications Dashboard</h5>
</div>


    <div class="col-md-6">
      <div class="col-md-12">
        <!-- Pending Applications -->
          @include('partials.applications.pending-list')
      </div>
    </div>

    <div class="col-md-4">
      <!-- Approved Applications -->
      @include('partials.applications.approved-list')

      <!-- Denied Applications -->
      @include('partials.applications.denied-list')
    </div>

    

</div> <!-- End Container -->
@stop

@section('bottomscript')
<script type="text/javascript">

    $(document).ready(function() {
        // APPLICATIONS //

        // Hide all existing application boxes.
        $('.dashboard-application-box').hide();

        // Target display buttons and add event listener.
        $('.btn-display').click(function(event) {
            event.preventDefault();
            
            var button = this;
            var id = button.id;
            var buttonContent = $(this).html();
            
            $('#application_' + id).slideToggle();
            
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      //
    });
</script>
@stop