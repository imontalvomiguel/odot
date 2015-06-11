<?php

class TodoList extends Eloquent {
	public function listItems() 
	{
		return $this->hasMany('TodoItem');
	}

	public function delete()
	{
		$related_items = TodoItem::where('todo_list_id', $this->id);
		$related_items->delete();
		parent::delete();
	}

}
