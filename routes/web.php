<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    
    $router->group(['prefix' => 'auth'], function () use ($router) {
		$router->post(
		    'login', 
		    [
		       'uses' => 'AuthController@authenticate'
		    ]
		);
		$router->post(
		    'register', 
		    [
		       'uses' => 'AuthController@register'
		    ]
		);
    });


	$router->group(
	    ['middleware' => 'jwt.auth'], 
	    function() use ($router) {
	        $router->get('users', function(Request $request) {
	            $users = \App\User::where('id', $request->auth)->first();
	        	return $users;
	        });
	    }
	);

});
