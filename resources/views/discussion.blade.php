@extends('layouts.app')
@section('content')

<div class="container">
    <h2>{{$thread->thread_title}}</h2>       
  
  @foreach($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">Posted by : <b>{{$author[$post->id][0]['name']}}</b></div>
                <div class="col-md-3">Posted at : <b>{{$post->created_at}}</b></div>                
            </div>            
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">{{$post->post_content}}</div>
                <div class="col-md-3">
                @if(Auth::check())
                    @if(Auth::id() == $author[$post->id][0]['id'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('posts.edit', [$thread->id, $post->id] )}}">
                                    <button type="button" class="btn btn-primary btn-block">Edit</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button type="button" class="btn btn-danger btn-block">Delete</button>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
                </div>
            </div>                                
        </div>
    </div>
  @endforeach   
  <hr>
    <div class="row">    
        @if(Auth::check())      
        <form method="post" action="{{ route('posts.create', $thread->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="#postcreate">Create a post:</label>
                <textarea class="form-control" name="post_content" id="postcreate" rows="5" cols="5" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish Post</button> 
        </form>  
        @endif                                                                                     
    </div>          
@endsection
