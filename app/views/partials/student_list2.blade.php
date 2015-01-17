@if ($students)

    <div class="col-md-12 search-form">

        <h3> Search Area </h3>

        {{-- {{ Form::open(array('url' => 'foo/bar', 'method' => 'GET')) }}

        {{ Form::label('', '') }}
        {{ Form::input('', null, array('class' => '')) }}

        {{ Form::label('', '') }}
        {{ Form::input('', null, array('class' => '')) }}

        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
        {{ Form::close() }} --}}
    </div>

     <div class="text-center">
        {{ $students->links() }}
    </div>

    @foreach ($students as $key => $student)
        <div class="col-md-12 student-box ">
            <div class="btn-group pull-right">

                <a href="{{ action('UsersController@show', $student->id) }}" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                </a>
                
                <a href="{{ action('UsersController@edit', $student->id) }}" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>

                <a href="" class="deleteUser btn btn-default btn-sm" data-userid="{{$student->id}}">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                </a>
            </div>

            <div class="student-details">

                <p class="student-name">{{ $student->fullname }}</p>
                <p class="student-info">{{ $student->email }}</p>
                <p class="student-info">{{ $student->phone }}</p>
                <p class="student-info">{{ $student->address }}</p>
                <p class="student-info">{{ $student->age }}</p>

                @if($student->financing)
                    Financing status: {{ $student->financing_status }}
                @endif
            </div>
        </div> <!-- End Student Box -->
    @endforeach

    <div class="text-center">
        {{ $students->links() }}
    </div>

@endif