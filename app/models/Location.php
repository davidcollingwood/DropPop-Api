<?php

class Location extends Eloquent {
    
    protected $fillable = array('lat', 'lng');
    protected $appends = array('coords');
    
    public function bubbles() {
        return $this->hasMany('Bubble');
    }
    
    public function getLatAttribute($lat) {
        return $lat / 1000000;
    }
    
    public function getLngAttribute($lng) {
        return $lng / 1000000;
    }
    
    public function setLatAttribute($lat) {
        $this->attributes['lat'] = (int) ($lat * 1000000);
    }
    
    public function setLngAttribute($lng) {
        $this->attributes['lng'] = (int) ($lng * 1000000);
    }
    
    public function getCoordsAttribute() {
        return $this->lat . ' ' . $this->lng;
    }
    
}