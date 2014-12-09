@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h2 class="page-header">Register An Account</h2>

            {{ Form::open(array('action' => array('UsersController@store'), 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}
                
                <!-- First Name -->
                {{ Form::label('firstname', 'First Name') }}
                {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
                {{ $errors->first('firstname', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Last Name -->
                {{ Form::label('lastname', 'Last Name') }}
                {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
                {{ $errors->first('lastname', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                
                <!-- Phone -->
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-group form-control', 'placeholder' => 'Phone')) }}
                {{ $errors->first('phone', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
 
                <!-- Password -->
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
                {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Password Confirm -->
                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('password_confirmation', array('class' => 'form-group form-control', 'placeholder' => 'Confirm Password')) }}
                {{ $errors->first('password_confirmation', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::submit('Register', array('id' => 'registerBtn', 'class' => 'btn btn-success btn-block')) }}
            
            {{ Form::close() }}

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">
    
    // $(document).ready(function() {
        
    //     var first = '';
    //     var last = '';
    //     var phone = '';
    //     var email = '';
    //     var password = '';
    //     var password_confirmation = '';

    //     function btnCheck(){
    //         if (first && last && phone && email && password.length >= 8) {
    //             if (password === password_confirmation) {
    //                 $('#registerBtn').removeClass('disabled');
    //             };

    //         } 
    //         else if (password.length <= 7 || password !== password_confirmation) {
    //             $('#registerBtn').addClass('disabled');  
    //         }
    //     }

    //     $('#first').on('keyup', function() {
    //         first = $(this).val();
    //         btnCheck();
    //     });

    //     $('#last').on('keyup', function() {
    //         last = $(this).val();
    //         btnCheck();
    //     });

    //     $('#email').on('keyup', function() {
    //         email = $(this).val();
    //         btnCheck();
    //     });

    //     $('#phone').on('keyup', function() {
    //         phone = $(this).val();
    //         btnCheck();
    //     });

    //     $('#password').on('keyup', function() {
    //         password = $(this).val();
    //         btnCheck();
    //     });

    //     $('#password_confirmation').on('keyup', function() {
    //         password_confirmation = $(this).val();
    //         btnCheck();
    //     });
    // });

</script>


@stop