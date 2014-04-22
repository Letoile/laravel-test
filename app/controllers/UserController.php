<?php

class UserController extends BaseController {

	protected $layout = 'layouts.master';

	public function edit($id)
	{
		$user = User::find($id);

		if (Input::get("name") || Input::get("email")) {
			$rules = array(
				'name' 	=> 'required|unique:users,name,'. $user->id,
				'email'	=> array('required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', 'unique:users,email,' . $user->id)
			);

			$messages = array(
				'required' => 'The :attribute field is required.',
			);

			$validator = Validator::make(Input::all(), $rules, $messages);

			if($validator->fails()){
				return Redirect::refresh()->withInput()->withErrors($validator);
			}

			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->save();
			return Redirect::action("users.index")->with("changed", true);
		}
		$this->layout->content =  View::make('users.edit', array("user" => $user));
	}

	public function index()
	{
		$this->layout->content =  View::make('users.index');
	}

}
