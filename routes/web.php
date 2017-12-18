<?php

use App\Post;
use App\Thread;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostsController@index');

Route::get('/threads', ['as' => 'allthreads', 'uses' => 'ThreadsController@index']);
Route::post('/threads/create', ['as'=>'threads.create','uses'=>'ThreadsController@store']);

Route::get('/threads/{thread_id}', ['as' => 'thread.view', 'uses' => 'DiscussionController@index']);

Route::post('/threads/{thread_id}/createpost', ['as'=>'posts.create','uses'=>'PostsController@store']);
Route::get('/threads/{thread_id}/{post_id}/edit', ['as'=>'posts.edit','uses'=>'PostsController@edit']);
Route::patch('/threads/{thread_id}/posts/{post_id}/update', ['as'=>'posts.update','uses'=>'PostsController@update']);
Route::delete('/threads/{thread_id}/posts/{post_id}/delete', ['as'=>'posts.delete','uses'=>'PostsController@destroy']);


Route::get('profile', 'UserController@profile');
Route::post('profile', ['uses'=>'UserController@update_avatar', 'as'=>'avatar.update']);
