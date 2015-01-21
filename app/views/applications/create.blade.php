@extends('layouts.master')

@section('topscript')
@stop

@section('content')

<div class="container">
    <div class="row clearfix">
        <div class="col-md-6 col-md-offset-3">

            <h2 class="page-header">Submit Your Application</h2>

            {{ Form::open(array('action' => array('ApplicationsController@store'), 'class'=>'form', 'role'=>'form', 'method' => 'POST', 'files' => true)) }}

                <!-- Select A Course -->
                {{ Form::label('course_id', 'Select A Course: ') }}
                {{ Form::select('course_id', array('' => 'Select Course') + Course::where('status', '=', 'active')->lists('designation', 'id'), null, array('class' => 'form-group form-control')) }}
                
                <!-- Gender -->
                {{ Form::label('gender', 'Choose your gender: ')}}
                {{ Form::select('gender', array('male' => 'Male', 'female' => 'Female', 'unknown' => 'Prefer Not To Say'), null, array('class' => 'form-group form-control')) }}

                <!-- DOB -->
                <label for="dob"> Date of Birth </label>
                <input id="dob" type="date" class="form-group form-control">

                <!-- Phone -->
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-group form-control', 'placeholder' => 'Phone')) }}
                {{ $errors->first('phone', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

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

                <hr>

                <!-- Employment Status -->
                {{ Form::label('employment_status', 'What is your current status of employment?') }}
                {{ Form::select('employment_status', array('employed' => 'Employed', 'self_employed' => 'Self-employed', 'unemployed' => 'Unemployed', 'student' => 'Student'), null, array('class' => 'form-group form-control')) }}

                <!-- Financing? -->
                {{ Form::label('financing_status', 'Are you applying for financing?') }}
                {{ Form::select('financing_status', array('full' => 'Yes, I need to finance 100%', 'partial' => 'Yes, but only partial tuition.', 'unsure' => 'Maybe, still not sure.', 'none' => 'Nope, I am paying ahead of time.'), null, array('class' => 'form-group form-control'))}}

                <!-- How did you hear about us? -->
                {{ Form::label('referred_by', 'How did you hear about us?') }}
                {{ Form::text('referred_by', Input::old('referred_by'), array('class' => 'form-group form-control')) }}

                <!-- Background Information -->
                {{ Form::label('bg_info', 'Please explain, in 1-2 paragraphs, why you are applying for Codeup.') }}
                {{ Form::textarea('bg_info', Input::old('bg_info'), array('class' => 'form-group form-control')) }}
                {{ $errors->first('bg_info', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Questions for us? -->
                {{ Form::label('questions', 'Do you have any questions for us?') }}
                {{ Form::textarea('questions', Input::old('questions'), array('class' => 'form-group form-control')) }}
                {{ $errors->first('questions', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

                <!-- Upload Resume -->
                {{ Form::label('resume', 'Upload your resume or CV') }}
                {{ Form::file('resume', array('class' => 'form-group customBtn')) }}

                {{ Form::submit('Apply!', array('class' => 'btn btn-success btn-block')) }}
            
            {{ Form::close() }}

        </div> <!-- End Column -->
    </div> <!-- End Row -->
</div> <!-- End Container -->
@stop

@section('bottomscript')
@stop