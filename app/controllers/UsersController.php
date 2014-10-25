<?php

class UsersController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }
    
	public function getUsers() {
        $users = $this->user->all();
        
		return View::make('users.users')->with('users', $users);
	}
	
	public function getNewUser() {
        $user = new $this->user;
        
    	return View::make('users.user')->with('user', $user);
	}
	
	public function saveUser() {
        $data = Input::all();
        
    	$user = new $this->user;
    	$user->first_name = $data['first_name'];
    	$user->last_name = $data['last_name'];
    	$user->gender = $data['gender'];
    	$user->email = $data['email'];
    	$user->save();
    	
    	return Redirect::route('users.all');
	}
	
	public function getUser($id) {
    	$user = $this->user->findOrFail($id);
    	
    	return View::make('users.user')->with('user', $user);
	}
	
	public function postUser($id) {
    	$data = Input::all();
    	
    	$user = $this->user->findOrFail($id);
    	$user->first_name = $data['first_name'];
    	$user->last_name = $data['last_name'];
    	$user->gender = $data['gender'];
    	$user->email = $data['email'];
    	$user->save();
    	
    	return Redirect::route('users.all');
	}

}