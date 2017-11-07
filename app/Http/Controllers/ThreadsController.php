<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread;

class ThreadsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // no need to authenticate here
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::all();
        //$posts = Thread::find(2)->posts;      
        //$posts = Thread::find(1)->posts;  
        //$posts = Thread::find(1)->post_one;  
        //  $posts = Post::all();// This can be done when not using eloquent ORM
        //$index = 1;
        foreach($threads as $value)
        {
            $posts[$value->id] = Thread::find($value->id)->posts;    
            //$index++;
        }

        //$posts[1] = Thread::find(1)->posts;
        //$posts[2] = Thread::find(2)->posts;
        
        return view('threads')->with('threads', $threads)->with('posts',$posts);         
    }
}
