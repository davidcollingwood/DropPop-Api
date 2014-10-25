@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            
            @if ($user->id)
                {{ Form::model($user, array('route' => array('users.update', $user->id), 'class' => 'well')) }}
            @else
                {{ Form::model($user, array('route' => 'users.save', 'class' => 'well')) }}
            @endif
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="first_name">First Name</label>
                        {{ Form::text('first_name', null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="last_name">Last Name</label>
                        {{ Form::text('last_name', null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="gender">Gender</label>
                        {{ Form::select('gender', array('-1' => '', 'male' => 'Male', 'female' => 'Female'), null, array('class' => 'form-control', 'required' => 'true')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="email">Email</label>
                        {{ Form::email('email', null, array('class' => 'form-control', 'required' => 'true')) }}
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