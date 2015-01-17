@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container">

    <div class="pull-right dashboard-tag">
        <h5>Applications Dashboard</h5>
    </div>

    <div class="page-header">
        <h2>Welcome {{ Auth::user()->first }}!</h2>
    </div>

    <!-- Pulse -->

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div class="col-md-6">

        @include('partials.pending-application-list')

    </div> <!-- End Column -->

    <div class="col-md-4">
        <h3 class="page-header">Recently Processed</h3>

        <h4><strong>ID  |   NAME      |     COURSE       |  STATUS </strong></h4>
        <h5>id5 | John Smith  | Codeup Gap Year  | Approved</h5>
        <h5>id6 | Jane Smith  | Codeup Night Classes  | Denied</h5>
        <h5>id7 | Dale Smith  | Codeup Day Classes  | Approved</h5>

    </div>

</div> <!-- End Container -->
@stop

@section('bottomscript')
<script type="text/javascript">

        // Grab that applicant's hidden form and submit ajax request.
    // $('.approveBtn').click(function(event) {
    //     var form = $(this).next('form');
    //     console.log(form);

    //     var data = $(form).serialize();

    //     $.ajax({
    //         type: 'post',
    //         cache: false,
    //         dataType: 'json',
    //         data: data,
    //         success: function(data) {
    //             console.log(data);
    //         },
    //     }).done(function() {
  
    //         // $( this ).addClass( "done" );
    //         console.log('done.');

    //     });
        
    // });

    // $(document).ready(function(){

    //        $('.approveBtn').click(function() {

    //        var $post = $(this).next('form');
    //        console.log($post);

    //            var url             = "http://add.dev/dashboards/application";
    //            // var $post             = {};
    //            // $post.id            = $(this).attr('id');
    //            console.log($post.id);
    //            // $post.size            = $('#size_' + $post.id).val();
    //            // $post.colour        = $('#colour_' + $post.id).val();
    //            // $post.stock            = $('#stock_' + $post.id).val();

    //            $.ajax({
    //            type: "POST",
    //            url: url,
    //            data: $post,
    //            cache: false,
    //            success: function(data){
    //               return data;
    //            }
    //            });
    //            return false;
    //        });
    //     });


</script>
@stop