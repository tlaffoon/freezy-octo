@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h2 class="page-header">Register An Account</h2>

            {{ Form::open(array('action' => array('UsersController@store'), 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}
                
                <!-- First Name -->
                {{ Form::label('first', 'First Name') }}
                {{ Form::text('first', Input::old('first'), array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
                {{ $errors->first('first', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Last Name -->
                {{ Form::label('last', 'Last Name') }}
                {{ Form::text('last', Input::old('last'), array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
                {{ $errors->first('last', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                
                <!-- Phone -->
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-group form-control', 'placeholder' => '#')) }}
                {{ $errors->first('phone', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
 
                <!-- Password -->
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
                {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Password Confirm -->
                {{ Form::label('password_confirm', 'Confirm Password') }}
                {{ Form::password('password_confirm', array('class' => 'form-group form-control', 'placeholder' => 'Confirm Password')) }}
                {{ $errors->first('password_confirm', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::submit('Register', array('id' => 'registerBtn', 'class' => 'btn btn-default btn-success btn-block disabled')) }}
            
            {{ Form::close() }}

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('footer')
<script type="text/javascript">
    
    $(document).ready(function() {
        
        var first = '';
        var last = '';
        var phone = '';
        var email = '';
        var password = '';
        var password_confirm = '';

        function btnCheck(){
            if (first && last && phone && email && password.length >= 8) {
                if (password === password_confirm) {
                    $('#registerBtn').removeClass('disabled');
                };

            } 
            else if (password.length < 8 || password !== password_confirm) {
                $('#registerBtn').addClass('disabled');  
            }
        }

        $('#first').on('keyup', function() {
            first = $(this).val();
            btnCheck();
        });

        $('#last').on('keyup', function() {
            last = $(this).val();
            btnCheck();
        });

        $('#email').on('keyup', function() {
            email = $(this).val();
            btnCheck();
        });

        $('#phone').on('keyup', function() {
            phone = $(this).val();
            btnCheck();
        });

        $('#password').on('keyup', function() {
            password = $(this).val();
            btnCheck();
        });

        $('#password_confirm').on('keyup', function() {
            password_confirm = $(this).val();
            btnCheck();
        });
    });

</script>


@stop