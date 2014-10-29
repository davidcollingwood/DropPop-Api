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
                    <div class="col-xs-12 form-group">
                        <label for="thumbnail">Pictures</label>
                        {{ Form::text('thumbnail', $user->picture->thumbnail, array('class' => 'form-control', 'placeholder' => 'Thumbnail')) }}
                        {{ Form::text('medium', $user->picture->medium, array('class' => 'form-control', 'placeholder' => 'Medium')) }}
                        {{ Form::text('large', $user->picture->large, array('class' => 'form-control', 'placeholder' => 'Large')) }}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="me">Mark as Me</label><br />
                        {{ Form::checkbox('me', null, array('class' => 'form-control')) }}
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
        @if ($user->id)
            <div class="col-xs-12 col-sm-6">
                
                {{ Form::model($user, array('route' => array('users.update-favourite-articles', $user->id), 'class' => 'well')) }}
                    
                    <h2>Favourite Articles</h2>
                    
                    @foreach ($articles as $article)
                        <div class="row">
                            <div class="col-xs-12 checkbox">
                                <label>
                                    {{ Form::checkbox('favourite_articles[]', $article->id, $user->favouriteArticles->contains($article->id)) }}
                                    {{ $article->title }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="row">
                        <div class="col-xs-12">
                            {{ Form::button('Cancel', array('class' => 'btn btn-default pull-left', 'onclick' => 'window.history.back()')) }}
                            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                        </div>
                    </div>

                    
                {{ Form::close() }}
                
            </div>
            <div class="col-xs-12 col-sm-6">
                
                {{ Form::model($user, array('route' => array('users.update-recent-articles', $user->id), 'class' => 'well')) }}
                    
                    <h2>Recent Articles</h2>
                    
                    @foreach ($articles as $article)
                        <div class="row">
                            <div class="col-xs-12 checkbox">
                                <label>
                                    {{ Form::checkbox('recent_articles[]', $article->id, $user->recentArticles->contains($article->id)) }}
                                    {{ $article->title }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="row">
                        <div class="col-xs-12">
                            {{ Form::button('Cancel', array('class' => 'btn btn-default pull-left', 'onclick' => 'window.history.back()')) }}
                            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                        </div>
                    </div>
                    
                {{ Form::close() }}
                
            </div>
            <div class="col-xs-12 col-sm-6">
                
                {{ Form::model($user, array('route' => array('users.update-friends', $user->id), 'class' => 'well')) }}
                    
                    <h2>Friends</h2>
                    
                    @foreach ($friends as $friend)
                        <div class="row">
                            <div class="col-xs-12 checkbox">
                                <label>
                                    {{ Form::checkbox('friends[]', $friend->id, $user->friends->contains($friend->id)) }}
                                    {{ $friend->full_name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="row">
                        <div class="col-xs-12">
                            {{ Form::button('Cancel', array('class' => 'btn btn-default pull-left', 'onclick' => 'window.history.back()')) }}
                            {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
                        </div>
                    </div>
                    
                {{ Form::close() }}
                
            </div>
        @endif
    </div>
    
@stop