@extends('layouts.app')
@section('content')

<div class="container">
  <h2>Recent Discussions</h2>
  <p>Login to start discussions.</p>                                                                                      
  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Started by</th>
        <th>Category</th>
        <th>Number of Posts</th>
        <th>Last Updated</th>        
      </tr>
    </thead>
    <tbody>
    @foreach($threads as $thread)        
      <tr>
        <td>
          <a href="{{ route('discussion', [$thread->id]) }}"> 
            {{$thread->thread_title}}
          </a>
        </td>
        <td>{{$threadLeader[$thread->id]}}</td>
        <td>{{$thread->thread_category}}</td>
        <td>{{count($posts[$thread->id])}}</td>        
        <td>{{$thread->updated_at}}</td>        
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
</div>

@endsection

