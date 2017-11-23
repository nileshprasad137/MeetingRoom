@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">    
    <h2>Recent Discussions</h2>
    @if(Auth::check())       
      <a href="#" data-toggle="modal" data-target="#create_thread">
        <button type="button" class="btn btn-primary">Create New Thread</button> 
      </a>
    @endif    
  </div>                                                                                       
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
    @if($threads->isEmpty())
      <tr>
        <td colspan="5">No Threads Yet</td>
      </tr>
    @endif
    @foreach($threads as $thread)        
      <tr>
        <td>
          <a href="{{ route('thread.view', [$thread->id]) }}"> 
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

<div class="modal fade" id="create_thread" role="dialog">
  <div class="modal-dialog">    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Thread</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('threads.create') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="thread_title">Thread Title:</label>
            <input type="text" class="form-control input-sm" name="thread_title" id="thread_title" placeholder="Enter Thread Title">
          </div>
          <div class="form-group">
            <label for="category">Enter Category Name:</label>
            <input type="text" class="form-control input-sm" name="category" id="category" placeholder="Enter Category Name">
          </div>
          <div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>          
        </form>
      </div>      
    </div>      
  </div>
</div>

@endsection

