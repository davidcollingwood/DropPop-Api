<?php

class LocationsController extends BaseController {
    
    protected $location;
    
    public function __construct(Location $location) {
        $this->location = $location;
    }
    
	public function getLocations() {
        $locations = $this->location->all();
        
		return View::make('locations.locations')->with('locations', $locations);
	}
	
	public function getNewLocation() {
        $location = new $this->location;
        
    	return View::make('locations.location')->with('location', $location);
	}
	
	public function saveLocation() {
        $data = Input::all();
        
    	$location = new $this->location;
    	$location->lat = $data['lat'];
    	$location->lng = $data['lng'];
    	$location->save();
    	
    	return Redirect::route('locations.all');
	}
	
	public function getLocation($id) {
    	$location = $this->location->findOrFail($id);
    	
    	return View::make('locations.location')->with('location', $location);
	}
	
	public function postLocation($id) {
    	$data = Input::all();
    	
    	$location = $this->location->findOrFail($id);
    	$location->lat = $data['lat'];
    	$location->lng = $data['lng'];
    	$location->save();
    	
    	return Redirect::route('locations.all');
	}
	
	public function deleteLocation($id) {
    	$this->location->destroy($id);
    	
    	return Redirect::route('locations.all');
	}

}