@extends('layouts.master')

@section('header')
<style type="text/css">

/*    body {
        background-image: url('/includes/img/class_resized.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    #login_form {
        background-color: white;
        padding-bottom: 20px;
        position: relative;
        top: 140px;
        right: 170px;
    }*/

</style>
@stop

@section('content')
 <div class="container">
    <div class="row clearfix">
        <div id="login_form" class="col-md-4 col-md-offset-4 img-rounded">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            {{ Form::open(array('url' => 'login', 'method' => 'post', 'class'=>'form', 'role'=>'form')) }}                
            
            <!-- Refactor to use individual error messages. -->
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <!-- Email -->
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
            {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
            
            <!-- Password -->
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('id' => 'password', 'class' => 'form-group form-control', 'placeholder' => 'Password')) }}
            {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

            <span class="help-block pull-left"><p class="text-warning p"><a href="#">Forgot Password?</a></p></span>
            <span class="help-block pull-right"><p class="text-warning p"><a href="/register">Register As A New User</a></p></span>

            <div class="clearfix"></div>

            {{ Form::submit('Login', array('id' => 'loginBtn', 'class' => 'btn btn-default btn-success btn-block disabled')) }}
            {{ Form::close() }}                

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('footer')
<script type="text/javascript">

    var email;
    var password;

    //  Validate email & password after capturing value.
    //  If input valid, then btnCheck()

    function btnCheck(){
        if (email && password) {
            $('#loginBtn').removeClass('disabled');
        };
    }

    $('#email').on('keyup', function() {
        email = $(this).val();
        btnCheck();
        // console.log(email);
    });

    $('#password').on('keyup', function() {
        password = $(this).val();
        btnCheck();
        // console.log(password);
    });



</script>
@stop

