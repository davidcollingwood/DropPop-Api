<?php

class User extends Eloquent {
    
    protected $fillable = array('first_name', 'last_name', 'gender', 'email', 'popped', 'dropped');
    protected $appends = array('full_name');
    protected $with = array('picture', 'favouriteArticles', 'recentArticles');
    
    public function bubbles() {
        return $this->hasMany('Bubble');
    }
    
    public function friends() {
        return $this->belongsToMany('User', 'friends', 'user_id', 'friend_id');
    }
    
    public function picture() {
        return $this->hasOne('UserPicture');
    }
    
    public function favouriteArticles() {
        return $this->belongsToMany('Article', 'favourite_articles');
    }
    
    public function recentArticles() {
        return $this->belongsToMany('Article', 'recent_articles');
    }
    
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    public function scopeMe() {
        return $this->where('me', true)->first();
    }
    
}