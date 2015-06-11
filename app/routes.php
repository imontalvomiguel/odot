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

Route::get('/', function() {
	return Redirect::route('todos.index');
});

Route::resource('todos', 'TodoListController');
Route::resource('todos.items', 'TodoItemController', ['except' => ['index', 'show']]);

Route::patch('todos/{todos}/tasks/{tasks}/complete', ['as' => 'todos.tasks.complete', 'uses' => 'TodoItemController@complete']);

// Event::listen('illuminate.query', function($query) {
// 	var_dump($query);
// });