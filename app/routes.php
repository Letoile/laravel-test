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

Route::get('/', "HomeController@showWelcome");

Route::any('/users/edit/{id}', array('as' => 'users.edit', "uses" => "UserController@edit"));

Route::any('/users/delete/{id}', array('as' => 'users.delete', "uses" => "UserController@delete"));

Route::any('/users/create', array('as' => 'users.create', "uses" => "UserController@create"));

Route::any('/users', array("as" => "users.index", "uses" => "UserController@index"));
