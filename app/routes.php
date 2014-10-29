<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* allow desktop browsers cross domain access via CORS */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, AuthToken");


/*
  Set CORS header options for all API requests

 */
Route::filter('api-cors', function() 
{
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT");
  header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, AuthToken");
});


/* divert any OPTIONS requests and process them here instead, setting CORS options.
   Laravel doesnt give any easy way to handle OPTIONS requests */
App::before(function($request)
{
    // Sent by the browser since request come in as cross-site AJAX
    // The cross-site headers are sent via .htaccess
    if ($request->getMethod() != "OPTIONS") 
      return;

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT");
  header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, AuthToken');
  die();

});







/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'api'), function() {
    
    /**
     * Article Routes
     */
    Route::get('articles', 'Api\ArticlesController@getArticles');
    Route::get('articles/{id}', 'Api\ArticlesController@getArticle')->where('id', '[0-9]+');
    
    /**
     * User Routes
     */
    Route::get('users', 'Api\UsersController@getUsers');
    Route::get('users/{id}', 'Api\UsersController@getUser')->where('id', '[0-9]+');
    Route::get('users/me', 'Api\UsersController@getMe');
    
    /**
     * Location Routes
     */
    Route::get('locations', 'Api\LocationsController@getLocations');
    Route::get('locations/{id}', 'Api\LocationsController@getLocation')->where('id', '[0-9]+');
    
    /**
     * Bubble Routes
     */
    Route::get('bubbles', 'Api\BubblesController@getBubbles');
    Route::get('bubbles/{id}', 'Api\BubblesController@getBubble')->where('id', '[0-9]+');
    
});


/**
 * Article Routes
 */
Route::get('articles', array('as' => 'articles.all', 'uses' => 'ArticlesController@getArticles'));
Route::get('articles/new', array('as' => 'articles.new', 'uses' => 'ArticlesController@getNewArticle'));
Route::post('articles/save', array('as' => 'articles.save', 'uses' => 'ArticlesController@saveArticle'));
Route::get('articles/{id}', array('as' => 'articles.article', 'uses' => 'ArticlesController@getArticle'))->where('id', '[0-9]+');
Route::post('articles/{id}', array('as' => 'articles.update', 'uses' => 'ArticlesController@postArticle'))->where('id', '[0-9]+');


/**
 * User Routes
 */
Route::get('users', array('as' => 'users.all', 'uses' => 'UsersController@getUsers'));
Route::get('users/new', array('as' => 'users.new', 'uses' => 'UsersController@getNewUser'));
Route::post('users/save', array('as' => 'users.save', 'uses' => 'UsersController@saveUser'));
Route::get('users/{id}', array('as' => 'users.user', 'uses' => 'UsersController@getUser'))->where('id', '[0-9]+');
Route::post('users/{id}', array('as' => 'users.update', 'uses' => 'UsersController@postUser'))->where('id', '[0-9]+');
Route::post('users/{id}/friends', array('as' => 'users.update-friends', 'uses' => 'UsersController@postUserFriends'))->where('id', '[0-9]+');
Route::post('users/{id}/favourite-articles', array('as' => 'users.update-favourite-articles', 'uses' => 'UsersController@postUserFavouriteArticles'))->where('id', '[0-9]+');
Route::post('users/{id}/recent-articles', array('as' => 'users.update-recent-articles', 'uses' => 'UsersController@postUserRecentArticles'))->where('id', '[0-9]+');


/**
 * Location Routes
 */
Route::get('locations', array('as' => 'locations.all', 'uses' => 'LocationsController@getLocations'));
Route::get('locations/new', array('as' => 'locations.new', 'uses' => 'LocationsController@getNewLocation'));
Route::post('locations/save', array('as' => 'locations.save', 'uses' => 'LocationsController@saveLocation'));
Route::get('locations/{id}', array('as' => 'locations.location', 'uses' => 'LocationsController@getLocation'))->where('id', '[0-9]+');
Route::post('locations/{id}', array('as' => 'locations.update', 'uses' => 'LocationsController@postLocation'))->where('id', '[0-9]+');


/**
 * Bubble Routes
 */
Route::get('bubbles', array('as' => 'bubbles.all', 'uses' => 'BubblesController@getBubbles'));
Route::get('bubbles/new', array('as' => 'bubbles.new', 'uses' => 'BubblesController@getNewBubble'));
Route::post('bubbles/save', array('as' => 'bubbles.save', 'uses' => 'BubblesController@saveBubble'));
Route::get('bubbles/{id}', array('as' => 'bubbles.bubble', 'uses' => 'BubblesController@getBubble'))->where('id', '[0-9]+');
Route::post('bubbles/{id}', array('as' => 'bubbles.update', 'uses' => 'BubblesController@postBubble'))->where('id', '[0-9]+');