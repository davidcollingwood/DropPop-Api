<?php

namespace Api;

use BaseController;
use JsonResponse;
use Bubble;
use Lang;

class BubblesController extends BaseController {
    
    protected $bubble;
    
    public function __construct(Bubble $bubble) {
        $this->bubble = $bubble;
    }
    
    public function getBubbles() {
        $bubbles = $this->bubble->all();
        
        return JsonResponse::success(array(
            'bubbles' => $bubbles->toArray()
        ));
    }
    
    public function getBubble($id) {
        $bubble = $this->bubble->find($id);
        
        if (!$bubble) {
            return JsonResponse::error(Lang::get('messages.bubble_not_found'));
        }
        
        return JsonResponse::success(array(
            'bubble' => $bubble->toArray()
        ));
    }

}