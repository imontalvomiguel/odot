<?php

class AuthController extends \BaseController {

	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
    		return Redirect::route('todos.index');
		}

		return Redirect::back()->withMessage('Incorrect username or password.')->withClass('danger');
	}

	public function logout()
	{
		Auth::logout();
    	return Redirect::route('home');
	}

}