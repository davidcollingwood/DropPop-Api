<?php

class User extends Eloquent {
    
    protected $fillable = array('first_name', 'last_name', 'gender', 'email', 'popped', 'dropped');
    protected $appends = array('full_name');
    
    public function bubbles() {
        return $this->hasMany('Bubble');
    }
    
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
}