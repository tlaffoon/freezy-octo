@extends('layouts.master')

@section('topscript')
<style type="text/css">
    .student-box {
        height: 170px;
        margin-bottom: 10px;
        padding: 10px;
        border: dashed #eee 1px;
    }
    .student-name {
        font-size: 18px;
    }
    .student-info {
        font-size: 16px;
    }
    .btn-select {
        margin-left: 50px;
        margin-right: 50px;
        margin-bottom: 10px;
    }
    .search-form {
        height: 120px;
        border: dashed #eee 1px;
        margin-bottom: 10px;
    }
</style>
@stop

@section('content')

<div class="container">

    <div class="pull-right dashboard-tag">
        <h5>Users Dashboard</h5>
    </div>
  
    <!-- Codeup Pulse -->
    @include('partials.pulse')

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div class="col-md-10">
        
        <!-- Users -->
        <h3 class="page-header">Users</h3>

<!--             <div class="btn-group">
                <button type="button" data-toggle="dropdown" class="btn btn-default btn-lg btn-select dropdown-toggle">Students 
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Active</a></li>
                    <li><a href="#">Pending</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div> -->


<!--             <div class="btn-group">
                <button type="button" data-toggle="dropdown" class="btn btn-default btn-lg btn-select dropdown-toggle">Staff 
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div> -->

            <!-- <button class="btn btn-default btn-lg btn-select">Speakers</button> -->

        <!-- Include User List -->
        @include('partials.student_list2')

    </div> <!-- End Column -->

</div> <!-- End Container -->
@stop

@section('bottomscript')
@stop