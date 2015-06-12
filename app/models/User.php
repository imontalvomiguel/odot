<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function todoLists() 
	{
		return $this->hasMany('TodoList');
	}

	public function delete()
	{

		$todoLists = TodoList::where('user_id', $this->id)->get();

		// Iterating each model to execute the delete method (that deletes dependent todoItems)
		foreach ($todoLists as $todoList) {	
			$todoList->delete();
		}

		parent::delete();
	}

}
