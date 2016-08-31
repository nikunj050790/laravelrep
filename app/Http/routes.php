<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* User Authentication */
//Route::get('/', 'UserController@index');

Route::get('/', function () { return view('welcome'); }); 
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('users/logout', 'Auth\AuthController@getLogout');

Route::get('articles', 'ArticleController@index');

//Route::get('users', 'Auth\AuthController@getRegister');
Route::get('users', 'UserController@getRegister');
Route::post('users/register', 'UserController@postRegister');

/* Authenticated users */
Route::group(['middleware' => 'auth.basic'], function()
{
    Route::get('users/dashboard', array('as'=>'dashboard', function()
	{
	return View('users.dashboard');
	}));
});