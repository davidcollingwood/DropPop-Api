<?php

namespace Api;

use BaseController;
use JsonResponse;
use User;
use Lang;

class UsersController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }
    
    public function getUsers() {
        $users = $this->user->all();
        
        return JsonResponse::success(array(
            'users' => $users->toArray()
        ));
    }
    
    public function getUser($id) {
        $user = $this->user->find($id);
        
        if (!$user) {
            return JsonResponse::error(Lang::get('messages.user_not_found'));
        }
        
        return JsonResponse::success(array(
            'user' => $user->toArray()
        ));
    }
    
    public function getMe() {
        $me = $this->user->me()->load('friends');
        
        if (!$me) {
            return JsonResponse::error(Lang::get('messages.user_not_found'));
        }
        
        return JsonResponse::success(array(
            'user' => $me->toArray()
        ));
    }

}