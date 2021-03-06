@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h2 class="page-header">Update Your Information</h2>

            {{ Form::model($user, array('action' => array('UsersController@update', $user->id), 'class'=>'form', 'role'=>'form', 'files' => true, 'method' => 'PUT' )) }}
              
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
              
                <!-- Address -->
                {{ Form::label('street', 'Street Address') }}
                {{ Form::text('street', Input::old('street'), array('class' => 'form-group form-control', 'placeholder' => 'Street Address')) }}
                {{ $errors->first('street', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::label('city', 'City') }}
                {{ Form::text('city', Input::old('city'), array('class' => 'form-group form-control', 'placeholder' => 'City')) }}
                {{ $errors->first('city', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::label('state', 'State') }}
                {{ Form::text('state', Input::old('state'), array('class' => 'form-group form-control', 'placeholder' => 'State')) }}
                {{ $errors->first('state', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                {{ Form::label('zip', 'Postal Code') }}
                {{ Form::text('zip', Input::old('zip'), array('class' => 'form-group form-control', 'placeholder' => 'Zip')) }}
                {{ $errors->first('zip', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
                <!-- End Address -->

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

                <hr>

                <!-- Image Upload for Profile -->
                {{ Form::label('image', 'Upload An Image') }}
                {{ Form::file('image', array('class' => 'fileUpload form-group')) }}
                {{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <hr>

                {{ Form::submit('Save', array('class' => 'btn btn-success btn-block')) }}
            
            {{ Form::close() }}

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

@stop

@section('bottomscript')
<script type="text/javascript">
    //
</script>
@stop