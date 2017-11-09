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

Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/{thread_id}', 'DiscussionController@index');
Route::patch('/threads/{thread_id}/{post_id}/edit', 'DiscussionController@update');
Route::delete('/threads/{thread_id}/{post_id}/delete', 'DiscussionController@destroy');
Route::get('/threads/{thread_id}/addpost', 'DiscussionController@create');
/*
Route::get('/find', function(){
    $posts = Post::all();
    print_r($posts);
});
*/
