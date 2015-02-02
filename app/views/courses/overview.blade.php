@extends('layouts.dashboard')

@section('topscript')
<style type="text/css">

    .recap-container {
        padding-left: 0px;
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

    .overview-comment-container {
        padding: 5px;
        border: dashed #eee 1px;
    }

    .overview-comment-box {
        border: solid #eee 1px;
    }

    .comment-title-box {
        padding-left: 5px;
        border-bottom: solid #eee 1px;

    }

    .comment-author {
        padding: 5px;
    }

    .comment-body {
        padding: 5px;
        text-indent: 15px;
    }

    .timestamp {
        border-bottom: solid #eee 1px;
    }

    #add-comment-button {
        position: absolute;
        right: 11px;
        top: 11px;
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

    <h2 class="page-header">{{ $course->designation }} Overview </h2>

    <div class="col-md-8 recap-container">
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

    <div class="col-md-4 overview-comment-container img-rounded">

        <div class="comment-title-box">

            <h4>Comments

                <!-- Make Comment Modal Button Trigger -->
                <a id="add-comment-button" href="#commentModal" class="btn btn-default btn-sm pull-right" role="button" rel="tooltip" data-original-title="Comment" data-toggle="modal" data-target="#commentModal_{{ $course->id}}">
                    <i class="fa fa-comment-o"></i>
                </a>

            </h4>

            <!-- Include Course Edit Modal -->
            @include('partials.courses.modals.add-comment')

        </div>

        @if(count($comments) > 0)
            <!-- Course Comments -->
            @foreach($comments as $comment)
                <div class="col-sm-12 no-padding-left">
                    <div class="text-muted comment-author">
                        {{ $comment->author->first }} said:
                    </div>
                </div>

                <div class="col-sm-12 no-padding-left">
                    <div class="comment-body">
                        <p> {{ $comment->body }} </p>
                    </div>
                </div>

                <div class="col-sm-12 no-padding-left">
                    <div class="text-muted timestamp text-right">
                        on {{ $comment->created_at }} 
                    </div>
                </div>
            @endforeach

        @else 

            <p> No comments found. </p>
        
        @endif 
    </div>

</div> <!-- End Row -->


@stop

@section('bottomscript')
@stop