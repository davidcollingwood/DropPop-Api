<?php

class Location extends Eloquent {
    
    protected $fillable = array('lat', 'lng');
    
    public function bubbles() {
        return $this->hasMany('Bubble');
    }
    
    public function getCoordinatesAttribute() {
        return $this->lat . ' ' . $this->lng;
    }
    
}