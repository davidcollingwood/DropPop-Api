<?php

class Bubble extends Eloquent {
    
    protected $with = array('article', 'location', 'user');
    public $timestamps = false;
    
    public function article() {
        return $this->belongsTo('Article');
    }
    
    public function location() {
        return $this->belongsTo('Location');
    }
    
    public function user() {
        return $this->belongsTo('User');
    }
    
}