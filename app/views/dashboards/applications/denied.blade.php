@extends('layouts.dashboard')

@section('topscript')
@stop

@section('content')

<div class="col-md-9">

    <!-- Denied Applications -->
    @include('partials.applications.denied-list')
    
</div>

<div class="col-md-3">
    <div class="pull-right dashboard-tag">
      <h5>Applications Dashboard</h5>
      <a href="/applications"> View All Applications </a>
    </div>
</div>

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
@stop