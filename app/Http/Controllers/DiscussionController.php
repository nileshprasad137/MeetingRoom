<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread;
use App\User;

class DiscussionController extends Controller
{    
    public function index($thread_id)
    {
        $thread = Thread::find($thread_id);
        $posts = $thread->posts;
        
        if($posts->isEmpty())
        {
            return view('discussion')->with('thread',$thread)->with('posts',$posts);
        }     
        else
        {
            foreach($posts as $post)
            {
                $author[$post->id] = User::where('id','=',$post->user_id)->get();                
            }
            return view('discussion')->with('thread',$thread)->with('posts',$posts)->with('author',$author);
        }
    }
}
