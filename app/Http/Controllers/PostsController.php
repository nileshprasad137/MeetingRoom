<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

use Session;

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        /*
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        */
        //$update = Post::find($post_id)->update($request->all());
        //return response()->json($update);

        //get post data
        $postData = $request->all();
        
        //update post data
        Post::find($post_id)->update($postData);
        
        //store status message
        Session::flash('success_msg', 'Post updated successfully!');

        return redirect()->route('allthreads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
    
        $post->delete();

        return redirect()->route('allthreads');    
        //Session::flash('flash_message', 'Task successfully deleted!');
    
        //return redirect()->route('tasks.index');
    }
}
