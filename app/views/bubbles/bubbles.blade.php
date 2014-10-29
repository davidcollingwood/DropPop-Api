@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Bubbles</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Article</th>
                        <th>User</th>
                        <th>Location</th>
                        <th class="text-right"><a href="{{ URL::route('bubbles.new') }}">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </a></th>
                    </thead>
                    <tbody>
                        @foreach ($bubbles as $bubble)
                            <tr>
                                <td>{{ $bubble->id }}</td>
                                <td>{{ $bubble->article->title }}</td>
                                <td>{{ $bubble->user->full_name }}</td>
                                <td>{{ $bubble->location->coords }}</td>
                                <td class="text-right">
                                    <a href="{{ URL::route('bubbles.bubble', array('id' => $bubble->id)) }}">
                                        <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a href="{{ URL::route('bubbles.delete', array('id' => $bubble->id)) }}">
                                        <i class="glyphicon glyphicon-remove"></i> Del
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
@stop