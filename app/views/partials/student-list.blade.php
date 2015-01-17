@if ($students)

    <table class="table table-striped table-hover table-bordered">

        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Role</th>
            
            <th>Gender</th>
            <th>DOB</th>
            <th>Age</th>
            
            <th class="actions-column">Actions</th>
        </tr>
        
        @foreach ($students as $key => $student)

            <tr>
                <td>{{ $student->fullname }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->role }}</td>

                <td>{{ $student->gender }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->age }}</td>
                <td>

                    <div class="btn-group">

                        <a href="{{ action('UsersController@show', $student->id) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                        
                        <a href="{{ action('UsersController@edit', $student->id) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="" class="deleteUser btn btn-default" data-userid="{{$student->id}}">
                            <span class="glyphicon glyphicon-remove-sign"></span>
                        </a>
                    </div>    
                </td>
            </tr>

        @endforeach

    </table>

    <div class="text-center">
        {{ $students->links() }}
    </div>

@endif