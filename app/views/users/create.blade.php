@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h2 class="page-header text-center">New User Registration</h2>

            {{ Form::open(array('action' => array('UsersController@store'), 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}
                
                <!-- Refactor to use individual error messages. -->
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <!-- First Name -->
                {{ Form::label('first', 'First Name') }}
                {{ Form::text('first', Input::old('first'), array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
                {{ $errors->first('first', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Last Name -->
                {{ Form::label('last', 'Last Name') }}
                {{ Form::text('last', Input::old('last'), array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
                {{ $errors->first('last', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Phone -->
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-group form-control', 'placeholder' => '#')) }}
                {{ $errors->first('phone', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Email -->
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
                {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                
                <!-- Password -->
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
                {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Password Confirm -->
                {{ Form::label('password_confirm', 'Confirm Password') }}
                {{ Form::password('password_confirm', array('class' => 'form-group form-control', 'placeholder' => 'Confirm Password')) }}
                {{ $errors->first('password_confirm', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::submit('Register', array('class' => 'btn btn-default btn-success btn-block')) }}
                {{ Form::close() }}

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">
    
    // Validate password fields are same with javascript

    function checkPassword(str)
    {
      var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
      return re.test(str);
    }

    function checkForm(form)
    {

        // check password value 1 against password value 2
        // return true if same
        // enable registration button

      if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
        if(!checkPassword(form.pwd1.value)) {
          alert("The password you have entered is not valid!");
          form.pwd1.focus();
          return false;
        }
      } else {
        alert("Error: Please check that you've entered and confirmed your password!");
        form.pwd1.focus();
        return false;
      }
      return true;
    }
</script>


@stop