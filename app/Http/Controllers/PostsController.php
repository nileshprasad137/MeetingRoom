<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
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
        $posts = Post::all();
        return view('posts')->with('posts', $posts);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $thread_id)
    {
        //echo "hello";
        $post = new Post;
        $post->post_content = $request->post_content;
        $post->thread_id = $thread_id;
        $post->user_id = Auth::user()->id;        
             
        //$thread->content = $request->content;
        $post->save();
     
        //Session::flash('success', 'Your article has been published.');
        return redirect()->route('allthreads');
        //return Thread::create([ 'thread_title' => request('thread_title'), 'user_id' => Auth::id()  ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($thread_id, $post_id)
    {
        //$product= Product::find($id);
        //return view('ProductCRUD.edit',compact('product'));
        $post = Post::findOrFail($post_id);        
        return view('editpost')->with('post',$post);
    }
}
