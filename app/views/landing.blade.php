@extends('layouts.master')

@section('topscript')
<style type="text/css">
    .lgfont {
        font-size: 28px;
    }
</style>
@stop

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column btn-group text-center">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <div class="">
                <a href="#" class="btn btn-default btn-lg pull-left" type="button">Login</a> 
                <span class="lgfont">Or</span>
                <a href="#" class="btn btn-default btn-lg pull-right" type="button">Signup</a>
            </div>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>
</div>
@stop

@section('bottomscript')
@stop