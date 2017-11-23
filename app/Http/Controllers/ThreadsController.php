<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if($threads->isEmpty())
        {
            return view('threads')->with('threads', $threads);  
        }
        else
        {
            foreach($threads as $thread)
            {
                $posts[$thread->id] = Thread::find($thread->id)->posts;                
                $threadLeader[$thread->id] = User::where('id','=',$thread->user_id)->value('name');
            }        
            return view('threads')->with('threads', $threads)->with('posts', $posts)->with('threadLeader', $threadLeader);  
        }           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = new Thread;
        $thread->thread_title = $request->thread_title;
        $thread->user_id = Auth::user()->id;
        $thread->thread_category = $request->category;
        $thread->save();
        return redirect()->route('allthreads');
    }
}
