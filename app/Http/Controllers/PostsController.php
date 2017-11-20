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
        $post = new Post;
        $post->post_content = $request->post_content;
        $post->thread_id = $thread_id;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('thread.view', $thread_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($thread_id, $post_id)
    {
        $post = Post::findOrFail($post_id);        
        return view('editpost')->with('post',$post)->with('thread_id', $thread_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $thread_id, $post_id)
    {
        
        $this->validate($request,[
            'post_content' => 'required'            
        ]);

        //get post data
        $postData = $request->all();
        
        //update post data
        Post::find($post_id)->update($postData);

        return redirect()->route('thread.view', $thread_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread_id,$post_id)
    {
        $post = Post::findOrFail($post_id);    
        $post->delete();
        return redirect()->route('thread.view', $thread_id);       
    }
}
