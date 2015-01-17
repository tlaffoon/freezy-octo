@extends('layouts.master')

@section('topscript')
@stop

@section('content')
 <div class="container">
    <div class="row clearfix">
        <div class="col-md-4 col-md-offset-4 img-rounded">

            <img class="img-responsive img-rounded" src="/includes/img/codeup-logo.jpg">

            <h2 class="page-header">Register An Account</h2>

            {{ Form::open(array('action' => 'UsersController@store', 'class'=>'form', 'role'=>'form', 'method' => 'POST' )) }}

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

