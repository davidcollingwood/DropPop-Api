@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Users</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Popped</th>
                        <th>Dropped</th>
                        <th class="text-right"><a href="{{ URL::route('users.new') }}">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </a></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->popped }}</td>
                                <td>{{ $user->dropped }}</td>
                                <td class="text-right"><a href="{{ URL::route('users.user', array('id' => $user->id)) }}">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
@stop