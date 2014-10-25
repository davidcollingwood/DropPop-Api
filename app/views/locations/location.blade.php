@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            
            @if ($location->id)
                {{ Form::model($location, array('route' => array('locations.update', $location->id), 'class' => 'well')) }}
            @else
                {{ Form::model($location, array('route' => 'locations.save', 'class' => 'well')) }}
            @endif
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="lat">Latitude</label>
                        {{ Form::text('lat', null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="lng">Longitude</label>
                        {{ Form::text('lng', null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        {{ Form::button('Cancel', array('class' => 'btn btn-default pull-left', 'onclick' => 'window.history.back()')) }}
                        {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                    </div>
                </div>
                
            {{ Form::close() }}
            
        </div>
    </div>
    
@stop