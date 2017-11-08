<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread;
use App\User;

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
        foreach($threads as $thread)
        {
            $posts[$thread->id] = Thread::find($thread->id)->posts;    
            //$threadLeader[$thread->id] = User::select('name')->where('id','=',$thread->user_id)->get();
            /** 
             * The above one return an object, the below one will return an array. 
            **/
            //$threadLeader[$thread->id] = User::where('id','=',$thread->user_id)->pluck('name');
            /** This one is perfect. If you know there is only one value to be returned , you can use value() function. */
            $threadLeader[$thread->id] = User::where('id','=',$thread->user_id)->value('name');
        }

        //$posts[1] = Thread::find(1)->posts;
        //$posts[2] = Thread::find(2)->posts;
        
        return view('threads')->with('threads', $threads)->with('posts', $posts)->with('threadLeader', $threadLeader);         
    }
}
