@extends('layouts.master')

@section('topscript')
<style type="text/css">

    #enter_email {
        margin-bottom: 10px;
    }

</style>
@stop

@section('content')
 <div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4 img-rounded">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h4 id="enter_email">Please enter your email to continue: </h4>

            {{ Form::open(array('url' => 'login', 'method' => 'post', 'class'=>'form-inline', 'role'=>'form')) }}                
            
                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'user@domain.com')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
           
            {{ Form::close() }}                

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">

</script>
@stop

