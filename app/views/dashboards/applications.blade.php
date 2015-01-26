@extends('layouts.dashboard')

@section('topscript')
@stop

@section('content')
<div class="pull-right dashboard-tag">
    <h5>Applications Dashboard</h5>
</div>


    <div class="col-md-6">
      <div class="col-md-12">
          @include('partials.pending-application-list')
      </div>
    </div>



    <div class="col-md-4">
      <!-- Approved Apps -->
      <h3 class="page-header">Approved Applications
          <div class="pull-right"><small>{{ count($applications) }}</small></div>
      </h3>
      {{-- @include('partials.approved-application-list') --}}
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      <!-- Denied Apps -->
      <h3 class="page-header">Denied Applications
          <div class="pull-right"><small>{{ count($applications) }}</small></div>
      </h3>
      {{-- @include('partials.denied-application-list') --}}
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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