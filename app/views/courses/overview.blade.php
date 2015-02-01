@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">

    .recap-container {
        margin-left: 0px;
    }

    .daily-recap {
        border: dashed #eee 1px;
        padding: 10px;
    }

    .daily-recap-body {
        text-indent: 15px;
        padding-bottom: 10px;
    }

    .recap-index-link {

        position: absolute;
        bottom: 5px;
        right: 25px;
    }

</style>
@stop

@section('content')

<div class="col-md-12">
    <div class="pull-right dashboard-tag">
      <h5>Course Overview</h5>
    </div>
</div>

<div class="row">

    <h2 class="page-header">{{ $course->designation }} Overview</h2>

    <div class="col-md-8 no-margin-left">
        <!-- Course Recaps -->
        <div class="daily-recap img-rounded">

            <h4>Daily Recap
                <small class="text-muted pull-right">Author on 2015-01-01</small>
            </h4>

            <p class="daily-recap-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
            <a href="#" class="recap-index-link">View All Daily Recaps</a>

        </div>
    </div>

    <div class="col-md-4 comment-container">
        @if($comments)
            <!-- Course Comments -->
            @foreach($comments as $comment)
                <div class="col-sm-12 comment-box">
                    
                    <div class="col-sm-12 comment-header">
                        <div class="text-muted pull-left">
                            {{ $comment->author->first }} said:
                        </div>

                        <div class="col-sm-12 comment-body">
                            <p> {{ $comment->body }} </p>
                        </div>
                    </div>

                    <div class="col-sm-12 timestamp">
                        <div class="text-muted pull-right">
                            on {{ $comment->created_at }} 
                        </div>
                    </div>

                </div>
            @endforeach
        @endif 
    </div>

</div>


@stop

@section('bottomscript')
@stop