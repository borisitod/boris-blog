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
//Authentication Routes

//Route::get('auth/login',  ['uses'=>'Auth\AuthController@getLogin', 'as'=>'login']);
//
//Route::post('auth/login','Auth\AuthController@postLogin');
//
//Route::get('logout',['uses'=>'Auth\LoginController@logout', 'as'=>'logout']);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout',['uses'=>'Auth\LoginController@logout', 'as'=>'logout']);
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registration Routes
//Route::get('auth/register','Auth\AuthController@getRegister');
//Route::post('auth/register','Auth\AuthController@postRegister');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Password Reset Routes
//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Categories
Route::resource('categories','CategoryController', ['except'=>['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog', ['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);

Route::get('contact', 'PagesController@getContact');

Route::post('contact', 'PagesController@postContact');

Route::get('/', 'PagesController@getIndex');

Route::get('about', 'PagesController@getAbout');

Route::resource('posts', 'PostController');
