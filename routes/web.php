<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Authentication Routes
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
// //Registarion Route
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@getRegister');

// Blog routes
Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);

//Pages Routes
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

//Post Routes
Route:: resource('posts', 'PostController');

//Category Routes
Route::resource('categories', 'CategoryController', ['except'=>['create']]);

//Tags Routes
Route::resource('tags', 'TagController', ['except'=>['create']]);
//Comment Routes
Route::post('comments/{post_id}',['uses' =>'CommentsController@store', 'as'=>'comments.store']);
Route::get('comments/{id}/edit', ['uses' =>'CommentsController@edit', 'as'=>'comments.edit']);
Route::put('comments/{id}/', ['uses' =>'CommentsController@update', 'as'=>'comments.update']);
Route::delete('comments/{id}/', ['uses' =>'CommentsController@destroy', 'as'=>'comments.delete']);
//Registration and Login Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
