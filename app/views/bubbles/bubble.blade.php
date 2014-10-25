@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            
            @if ($bubble->id)
                {{ Form::model($bubble, array('route' => array('bubbles.update', $bubble->id), 'class' => 'well')) }}
            @else
                {{ Form::model($bubble, array('route' => 'bubbles.save', 'class' => 'well')) }}
            @endif
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="article_id">Article</label>
                        {{ Form::select('article_id', $articles, null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="user_id">User</label>
                        {{ Form::select('user_id', $users, null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="location_id">Location</label>
                        {{ Form::select('location_id', $locations, null, array('class' => 'form-control', 'required' => 'true')) }}
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