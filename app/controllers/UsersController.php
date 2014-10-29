<?php

class UsersController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user, UserPicture $user_picture, Article $article) {
        $this->user = $user;
        $this->user_picture = $user_picture;
        $this->article = $article;
    }
    
	public function getUsers() {
        $users = $this->user->all();
        
		return View::make('users.users')->with('users', $users);
	}
	
	public function getNewUser() {
        $user = new $this->user;
        $user->picture = new $this->user_picture;
        
    	return View::make('users.user')->with('user', $user);
	}
	
	public function saveUser() {
    	$user = new $this->user;
    	
    	$user->first_name = Input::get('first_name');
    	$user->last_name = Input::get('last_name');
    	$user->gender = Input::get('gender');
    	$user->email = Input::get('email');
    	$user->save();
    	
    	$user->picture = new $this->user_picture;
    	$user->picture->user_id = $user->id;
    	$user->picture->thumbnail = Input::get('thumbnail');
    	$user->picture->medium = Input::get('medium');
    	$user->picture->large = Input::get('large');
    	$user->picture->save();
    	
    	return Redirect::route('users.all');
	}
	
	public function getUser($id) {
    	$user = $this->user->with('friends')->findOrFail($id);
    	$friends = $this->user->all();
    	$articles = $this->article->all();
    	
    	return View::make('users.user')->with(array(
    	    'user' => $user,
    	    'friends' => $friends,
    	    'articles' => $articles
        ));
	}
	
	public function postUser($id) {
    	$user = $this->user->findOrFail($id);
    	
    	$user->first_name = Input::get('first_name');
    	$user->last_name = Input::get('last_name');
    	$user->gender = Input::get('gender');
    	$user->email = Input::get('email');
    	$user->save();
    	
    	$user->picture->thumbnail = Input::get('thumbnail');
    	$user->picture->medium = Input::get('medium');
    	$user->picture->large = Input::get('large');
    	$user->picture->save();
    	
    	return Redirect::route('users.all');
	}
	
	public function postUserFriends($id) {
    	$friends = Input::get('friends');
    	if ($friends == null)
    	    $friends = array();
        
        $user = $this->user->findOrFail($id);
        $user->friends()->sync($friends);
        $user->save();
        
        return Redirect::route('users.all');
	}
	
	public function postUserFavouriteArticles($id) {
    	$favourite_articles = Input::get('favourite_articles');
    	if ($favourite_articles == null)
    	    $favourite_articles = array();
    	
    	$user = $this->user->findOrFail($id);
    	$user->favouriteArticles()->sync($favourite_articles);
    	$user->save();
    	
    	return Redirect::route('users.all');
	}
	
	public function postUserRecentArticles($id) {
        $recent_articles = Input::get('recent_articles');
        if ($recent_articles == null)
            $recent_articles = array();
        
    	$user = $this->user->findOrFail($id);
    	$user->recentArticles()->sync($recent_articles);
    	$user->save();
    	
    	return Redirect::route('users.all');
	}

}