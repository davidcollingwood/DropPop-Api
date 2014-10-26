<?php

class BubblesController extends BaseController {
    
    protected $bubble;
    
    public function __construct(Bubble $bubble, Article $article, User $user, Location $location) {
        $this->bubble = $bubble;
        $this->article = $article;
        $this->user = $user;
        $this->location = $location;
    }
    
	public function getBubbles() {
        $bubbles = $this->bubble->all();
        
		return View::make('bubbles.bubbles')->with('bubbles', $bubbles);
	}
	
	public function getNewBubble() {
        $bubble = new $this->bubble;
        $articles = $this->article->all()->lists('title', 'id');
        $users = $this->user->all()->lists('full_name', 'id');
        $locations = $this->location->all()->lists('coords', 'id');
        
    	return View::make('bubbles.bubble')->with(array(
    	    'bubble' => $bubble,
    	    'articles' => $articles,
    	    'users' => $users,
    	    'locations' => $locations
        ));
	}
	
	public function saveBubble() {
        $data = Input::all();
        
    	$bubble = new $this->bubble;
    	$bubble->article_id = $data['article_id'];
    	$bubble->location_id = $data['location_id'];
    	$bubble->user_id = $data['user_id'];
    	$bubble->save();
    	
    	return Redirect::route('bubbles.all');
	}
	
	public function getBubble($id) {
    	$bubble = $this->bubble->findOrFail($id);
        $articles = $this->article->all()->lists('title', 'id');
        $users = $this->user->all()->lists('full_name', 'id');
        $locations = $this->location->all()->lists('coords', 'id');
    	
    	return View::make('bubbles.bubble')->with(array(
    	    'bubble' => $bubble,
    	    'articles' => $articles,
    	    'users' => $users,
    	    'locations' => $locations
        ));
	}
	
	public function postBubble($id) {
    	$data = Input::all();
    	
    	$bubble = $this->bubble->findOrFail($id);
    	$bubble->article_id = $data['article_id'];
    	$bubble->location_id = $data['location_id'];
    	$bubble->user_id = $data['user_id'];
    	$bubble->save();
    	
    	return Redirect::route('bubbles.all');
	}

}