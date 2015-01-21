@extends('layouts.dashboard')

@section('topscript')

    <link rel="stylesheet" type="text/css" href="/includes/css/applications-dashboard.css">

@stop

@section('content')
<div class="pull-right dashboard-tag">
    <h5>Applications Dashboard</h5>
</div>


    <!-- Pulse -->

    <div class="col-md-6">

        @include('partials.pending-application-list')

    </div>

    <div class="col-md-3">
        <h3 class="page-header">Recently Approved</h3>
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

       //  // Why doesn't this work?  The token...
       //  $('.approveBtn').click(function() {

       //      var id = $(this).attr('data-id');
       //      console.log(id);

       //      var data = $('#form' + id).serialize();
       //      console.log(data);

       //      $.ajaxSetup({
       //         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       //      });

       //     var url = "http://app.dev/dashboard/applications";

       //     $.ajax({
       //         type: "POST",
       //         url: url,
       //         data: data,
       //         cache: false,
       //         success: function(data){
       //              return data;
       //         }
       //     });
       //     return false;
       // });

    });
</script>
@stop