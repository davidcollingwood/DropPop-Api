<?php

class UserPicture extends Eloquent {
    
    protected $fillable = array('thumbnail', 'medium', 'large');
    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo('User');
    }
    
}