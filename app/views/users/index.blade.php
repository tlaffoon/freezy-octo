@extends('layouts.master')

@section('content')

    <div class="container">

        <h2 class="page-header">User Index Page</h2>

        <?php if ($users): ?>

            <table class="table table-striped table-hover table-bordered">

                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Math</th>
                    <th>Logic</th>
                    <th>Prework</th>
                    <!-- <th>Address</th> -->
                    <!-- <th>Github Url</th> -->
                    <th class="actions-column">Actions</th>
                </tr>
                
                <?php foreach ($users as $key => $user): ?>

                    <tr>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td> ## </td>
                        <td> ## </td>
                        <td> ## </td>
                        <td>

                            <div class="btn-group">

                                <a href="{{ action('UsersController@show', $user->id) }}" class="btn btn-default btn-lg btn-info">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                                
                                <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-default btn-lg btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>

                                <a href="" class="deleteUser btn btn-default btn-lg btn-danger" data-userid="{{ $user->id }}">
                                    <span class="glyphicon glyphicon-remove-sign"></span>
                                </a>
                            </div>    
                        </td>
                    </tr>

                <?php endforeach ?>

            </table>

            <div class="text-center">
                {{ $users->links() }}
            </div>

        <?php endif ?>
    </div>

    {{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
    {{ Form::close() }}

@stop

@section('bottomscript')

<script type="text/javascript">
    $(".deleteUser").click(function() {
        var userID = $(this).data('userid');
        $("#deleteForm").attr('action', '/users/' + userID);
        if (confirm("Are you sure you want to delete this user?")) {
            $('#deleteForm').submit();
        }
    });
</script>

@stop