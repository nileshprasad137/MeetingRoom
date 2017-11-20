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

Route::get('/find', function(){
    $results = DB::table('users')
    ->join('chatthread', 'users.id', '=', 'chatthread.user_id')    
    ->select('users.*', 'chatthread.id', 'chatthread.thread_title')
    ->get();

    var_dump($results[0]->thread_title);
    var_dump($results[0]->name);
    //echo $users["0"]["thread_title"];
});

//['uses' => 'FooController@method', 'as' => 'name']
Route::get('/threads', ['uses' => 'ThreadsController@index', 'as' => 'allthreads']);
Route::post('/threads/create', ['as'=>'threads.create','uses'=>'ThreadsController@store']);

Route::get('/threads/{thread_id}', ['uses' => 'DiscussionController@index', 'as' => 'discussion']);

Route::delete('/threads/{thread_id}/{post_id}/delete', 'DiscussionController@destroy');

Route::post('/threads/{thread_id}/createpost', ['as'=>'posts.create','uses'=>'PostsController@store']);
Route::get('/threads/{thread_id}/{post_id}/edit', ['as'=>'posts.edit','uses'=>'PostsController@edit']);
Route::patch('/posts/{post_id}/update', ['as'=>'posts.update','uses'=>'PostsController@update']);
Route::delete('/posts/{post_id}/delete', ['as'=>'posts.delete','uses'=>'PostsController@destroy']);

/*
Route::get('/find', function(){
    $posts = Post::all();
    print_r($posts);
});
*/
