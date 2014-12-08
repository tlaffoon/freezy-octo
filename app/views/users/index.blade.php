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
                    <th>Actions</th>
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
                                <a href="#" class="btn btn-default btn-success">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>

                                <a href="#" class="btn btn-default btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>

                                <a href="#" class="deleteUser btn btn-default btn-danger" data-userid="{{ $user->id }}">
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

@stop