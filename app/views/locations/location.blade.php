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

@section('script')
    
    @if (!$location->id)
        <script>
            (function($) {
                var success = function(position) {
                    $('[name=lat]').val(position.coords.latitude);
                    $('[name=lng]').val(position.coords.longitude);
                };
                
                var error = function() {
                    alert('Dang...some error occurred, maybe a timeout? If you want to try again just refresh the page.');
                };
                
                var options = {
                    enableHighAccuracy: true
                };
                
                navigator.geolocation.getCurrentPosition(success, error, options)
            })(jQuery);
        </script>
    @endif
    
@stop