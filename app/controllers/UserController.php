<?php

/**
 * Class UserController
 */
class UserController extends BaseController {

	/**
	 * @var string
	 */
	protected $layout = 'layouts.master';

	/**
	 * Index page with user's list
	 */
	public function index() {
		$this->layout->content = View::make('users.index');
	}

	/**
	 * Edit info of user with specific id
	 *
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function edit($id) {
		$user = User::find($id);

		if (Input::get("name") || Input::get("email")) {
			$rules = array(
				'name' => 'required|unique:users,name,' . $user->id,
				'email' => array('required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', 'unique:users,email,' . $user->id)
			);

			$messages = array(
				'required' => 'The :attribute field is required.',
			);

			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails()) {
				return Redirect::refresh()->withInput()->withErrors($validator);
			}

			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->save();
			return Redirect::action("users.index")->with("status", "Your changes are applied successfully");
		}
		$this->layout->content = View::make('users.edit', array("user" => $user));
	}

	/**
	 * Create new user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function create() {
		$user = new User();

		if (Input::get("name") || Input::get("email")) {
			$rules = array(
				'name' => 'required|unique:users,name',
				'email' => array('required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', 'unique:users,email')
			);

			$messages = array(
				'required' => 'The :attribute field is required.',
			);

			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails()) {
				return Redirect::refresh()->withInput()->withErrors($validator);
			}

			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->save();
			return Redirect::action("users.index")->with("success", "Successfully created new user");
		}
		$this->layout->content = View::make('users.create');
	}

	/**
	 * Delete user with specific id
	 *
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id) {

		User::findOrFail($id)->delete();
		return Redirect::action("users.index")->with("success", "User was deleted");
	}

}
