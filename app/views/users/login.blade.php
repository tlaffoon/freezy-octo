@extends('layouts.master')

@section('topscript')
<style type="text/css">

</style>
@stop

@section('content')
 <div class="container">
    <div class="row clearfix">
        <div id="login_form" class="col-md-4 col-md-offset-4 img-rounded">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            {{ Form::open(array('url' => 'login', 'method' => 'post', 'class'=>'form', 'role'=>'form')) }}                
            
                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                
                <!-- Password -->
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
                {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}


                <span class="help-block pull-left"><a href="#">Forgot Password?</a></span>
                <span class="help-block pull-right"><a href="/register">Register As A New User</a></span>

                {{ Form::submit('Login', array('class' => 'btn btn-success btn-block')) }}

                <div class="pull-right">
                    {{ Form::label('remember_me', 'Keep Me Logged In') }}
                    {{ Form::checkbox('remember_me', null, true) }}
                </div>
           
            {{ Form::close() }}                

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">

</script>
@stop

