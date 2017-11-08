@extends('layouts.app')
@section('content')

<div class="container">
  <h2>{{$thread->thread_title}}</h2>
  <p>Login to start discussions.</p>   
  
  @foreach($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">Posted by : <b>{{$author[$post->id]}}</b></div>
                <div class="col-md-3">Posted at : <b>{{$post->created_at}}</b></div>                
            </div>            
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">{{$post->post_content}}</div>
            </div>
            <!--<button type="button" class="btn btn-success">Edit</button>-->        
        </div>
    </div>

  @endforeach
                                                                                    
</div>

@endsection

