<?php

class TodoItemController extends \BaseController {

	public function __construct()
	{
		/** Every time this is instantiated,
		* force csrf on POST method
		*/
		$this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 * @param int $list_id, each todo_item is related to a todo list: todos/{todos}/items/create
	 */
	public function create($list_id)
	{
		$todo_list = TodoList::findOrFail($list_id);
		return View::make('items.create')->withTodoList($todo_list);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($list_id)
	{
		$todo_list = TodoList::findOrFail($list_id);

		// define rules
		$rules = array(
			'content' => array('required')
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) {
			return Redirect::route('todos.items.create', $list_id)->withErrors($validator)->withInput();
		}

		// Getting the data
		$content = Input::get('content');
		$item = new TodoItem();
		$item->content = $content;
		// saves our nested todo item
		$todo_list->listItems()->save($item);
		return Redirect::route('todos.show', $list_id)->withMessage('Item was created!');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $list_id
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id);
		return View::make('items.edit')->withTodoItem($item)->withTodoListId($list_id);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $list_id
	 * @param  int  $id
	 * @return Response
	 */
	public function update($list_id, $item_id)
	{
		// define rules
		$rules = array(
			'content' => array('required')
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) {
			return Redirect::route('todos.items.edit', [$list_id, $item_id])->withErrors($validator)->withInput();
		}

		// Getting the data
		$content = Input::get('content');
		$item = TodoItem::findOrFail($item_id);
		$item->content = $content;
		$item->update();
		return Redirect::route('todos.show', $list_id)->withMessage('Item was updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id);
		$item->delete();
		return Redirect::route('todos.show', $list_id)->withMessage('Item was destroyed!');
	}

	/**
	 * Patch the specified resource in storage.
	 *
	 * @param  int  $list_id
	 * @param  int  $id
	 * @return Response
	 */
	public function complete($list_id, $item_id)
	{
		$item = TodoItem::findOrFail($item_id);
		$item->completed_on = date('Y-m-d H:i:s');
		$item->update();
		return Redirect::route('todos.show', $list_id)->withMessage('Item was completed!');
	}


}
