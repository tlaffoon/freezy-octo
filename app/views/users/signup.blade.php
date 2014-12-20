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

            <h4 id="enter_email">Please provide your information to continue: </h4>
            <hr>

            {{ Form::open(array('url' => 'login', 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}

                <!-- Username -->
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', Input::old('username'), array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
                {{ $errors->first('username', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                            
                <!-- Password -->
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
                {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Password Confirm -->
                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('password_confirmation', array('class' => 'form-group form-control', 'placeholder' => 'Confirm Password')) }}
                {{ $errors->first('password_confirmation', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::submit('Submit', array('class' => 'btn btn-success btn-block')) }}
            
            {{ Form::close() }}          

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">

</script>
@stop

