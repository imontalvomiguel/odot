<?php

use Illuminate\Support\Facades\Hash;

class UserController extends \BaseController {

	public function __construct()
	{
		/** Every time this is instantiated,
		* force csrf on POST method
		*/
		$this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete']));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// define rules
		$rules = array(
			'name' => array('required'),
			'email' => array('required', 'unique:users'),
			'password' => array('required')
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) {
			return Redirect::route('home')->withErrors($validator)->withInput();
		}

		// Getting the data
		$name = Input::get('name');
		$email = Input::get('email');
		$password = Input::get('password');

		$user = new User;
		$user->name = $name;
		$user->email = $email;
		$user->password = Hash::make($password);

		$user->save();

		Auth::login($user);

		return Redirect::route('todos.index')->withMessage('User was created')->withClass('success');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = Auth::user();
		return View::make('users.edit')->withUser($user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		$user = Auth::user();

		// define rules
		$rules = array(
			'name' => array('required'),
			'email' => array('required', 'unique:users,email,' . $user->id),
			'password' => ''
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) {
			return Redirect::route('users.edit', $id)->withErrors($validator)->withInput();
		}

		// Getting the data
		$name = Input::get('name');
		$email = Input::get('email');
		$password = Input::get('password');
		
		$user->name = $name;
		$user->email = $email;
		if (!empty($password)) {
			$user->password = Hash::make($password);
		}
		

		$user->update();
		return Redirect::route('todos.index')->withMessage('User was updated!')->withClass('success');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$user = Auth::user();

		$user->delete();

		return Redirect::route('home')->withMessage('User was destroyed!');
	}


}
