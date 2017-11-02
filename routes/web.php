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
    $users = DB::table('users')
    ->join('chatthread', 'users.id', '=', 'chatthread.user_id')    
    ->select('users.*', 'chatthread.id', 'chatthread.thread_title')
    ->get();

    var_dump($users[0]->thread_title);
    //echo $users["0"]["thread_title"];
});

/*
Route::get('/find', function(){
    $posts = Post::all();
    print_r($posts);
});
*/
