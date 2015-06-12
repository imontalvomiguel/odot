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

Route::get('/', array('as' => 'home', function() {
	return View::make('home');
}));

Route::resource('todos', 'TodoListController');
Route::resource('todos.items', 'TodoItemController', ['except' => ['index', 'show']]);

Route::patch('todos/{todos}/tasks/{tasks}/complete', ['as' => 'todos.tasks.complete', 'uses' => 'TodoItemController@complete']);

// Event::listen('illuminate.query', function($query) {
// 	var_dump($query);
// });

Route::post('login', array('as' => 'login', function()
{
	$email = Input::get('email');
	$password = Input::get('password');

    if (Auth::attempt(array('email' => $email, 'password' => $password)))
	{
    	return 'Yeiii :)';
	} else {
		return 'No mames -.-';
	}
}));