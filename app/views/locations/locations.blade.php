@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Locations</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th class="text-right"><a href="{{ URL::route('locations.new') }}">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </a></th>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->lat }}</td>
                                <td>{{ $location->lng }}</td>
                                <td class="text-right"><a href="{{ URL::route('locations.location', array('id' => $location->id)) }}">
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