<?php

namespace Api;

use BaseController;
use JsonResponse;
use Location;
use Lang;

class LocationsController extends BaseController {
    
    protected $location;
    
    public function __construct(Location $location) {
        $this->location = $location;
    }
    
    public function getLocations() {
        $locations = $this->location->all();
        
        return JsonResponse::success(array(
            'locations' => $locations->toArray()
        ));
    }
    
    public function getLocation($id) {
        $location = $this->location->find($id);
        
        if (!$location) {
            return JsonResponse::error(Lang::get('messages.location_not_found'));
        }
        
        return JsonResponse::success(array(
            'location' => $location->toArray()
        ));
    }

}