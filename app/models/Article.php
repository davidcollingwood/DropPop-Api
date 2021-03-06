<?php

class Article extends Eloquent {
    
    protected $fillable = array('title', 'content', 'author');
    
    public function bubbles() {
        return $this->hasMany('Bubble');
    }
    
    public function getLastModifiedAttribute() {
        return date('g:ia, j M Y', strtotime($this->updated_at));
    }
    
}