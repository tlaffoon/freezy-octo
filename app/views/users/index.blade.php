@extends('layouts.dashboard')

@section('content')

    <div class="container">

        <h2 class="page-header">User Index Page</h2>

        <?php if ($users): ?>

            <table class="table table-striped table-hover table-bordered">

                <tr>
                    <th>Name</th>
                    <!-- <th>Status</th> -->
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- <th>Address</th> -->
                    <!-- <th>Github Url</th> -->
                    <th>Actions</th>
                </tr>
                
                <?php foreach ($users as $key => $user): ?>

                    <tr>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
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

        <?php endif ?>
    </div>

@stop