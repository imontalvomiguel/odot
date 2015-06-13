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

/**
 * 
 */

Route::group(array('before' => 'guest'), function() 
{
	Route::get('/', array('as' => 'home', function() 
	{
		return View::make('home');
	}));

	Route::post('user', array('as' => 'user.store', 'uses' => 'UserController@store'));

	Route::post('login', array('as' => 'login', 'uses' => 'AuthController@login'));

});


Route::group(array('before' => 'auth'), function() 
{

	Route::get('user/edit', array('as' => 'user.edit', 'uses' => 'UserController@edit'));
	Route::put('user', array('as' => 'user.update', 'uses' => 'UserController@update'));
	Route::delete('user', array('as' => 'user.destroy', 'uses' => 'UserController@destroy'));

	Route::resource('todos', 'TodoListController');

	Route::resource('todos.items', 'TodoItemController', ['except' => ['index', 'show']]);

	Route::patch('todos/{todos}/tasks/{tasks}/complete', ['as' => 'todos.tasks.complete', 'uses' => 'TodoItemController@complete']);

	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

});

// Event::listen('illuminate.query', function($query) {
// 	var_dump($query);
// });