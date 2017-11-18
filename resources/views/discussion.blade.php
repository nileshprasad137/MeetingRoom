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
                                <button type="button" class="btn btn-primary btn-block">Edit</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-block">Delete</button>
                            </div>
                        </div>
                    @endif
                @endif
                </div>
            </div>                                
        </div>
    </div>
  @endforeach    
  <!--
    <div class="row">
        Create a Post:
        <textarea name="editor" id="ckview" cols="5" rows="5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis hic doloremque ex corporis provident 
            recusandae. Molestias alias dignissimos molestiae minus quia consectetur sint, maxime quidem. Repellat temporibus 
            similique iusto eaque.
        </textarea>                                                                                        
    </div>
    <div class="row">
        @if(Auth::check())       
        <a href="#" data-toggle="modal" data-target="#create_thread">
            <button type="button" class="btn btn-primary">Create New Post</button> 
        </a>
        @endif 
    </div>
    -->
@endsection
