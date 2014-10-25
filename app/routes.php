<?php

/**
 * Api Requests
 */

Route::group(array('prefix' => 'api'), function() {
    
    Route::get('articles', 'Api\ArticlesController@get');
    
});


/**
 * Article Views
 */
Route::get('articles', array('as' => 'articles.all', 'uses' => 'ArticlesController@getArticles'));
Route::get('articles/new', array('as' => 'articles.new', 'uses' => 'ArticlesController@getNewArticle'));
Route::post('articles/save', array('as' => 'articles.save', 'uses' => 'ArticlesController@saveArticle'));
Route::get('articles/{id}', array('as' => 'articles.article', 'uses' => 'ArticlesController@getArticle'))->where('id', '[0-9]+');
Route::post('articles/{id}', array('as' => 'articles.update', 'uses' => 'ArticlesController@postArticle'))->where('id', '[0-9]+');









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
/*
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, AuthToken");
*/


/*
  Set CORS header options for all API requests

 */
/*
Route::filter('api-cors', function() 
{
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT");
  header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, AuthToken");
});
*/


/* divert any OPTIONS requests and process them here instead, setting CORS options.
   Laravel doesnt give any easy way to handle OPTIONS requests */
/*
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
*/