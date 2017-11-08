@extends('layouts.app')
@section('content')

<div class="container">
  <h2>Recent Discussions</h2>
  <p>Login to start discussions.</p>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Discussion started by</th>
        <th>Category</th>
        <th>Number of Posts</th>
        <th>Last Updated</th>        
      </tr>
    </thead>
    <tbody>
    @foreach($threads as $row)        
      <tr>
        <td>{{$row->thread_title}}</td>
        <td>{{$row->user_id}}</td>
        <td>{{$row->thread_category}}</td>
        <td>{{count($posts[$row->id])}}</td>        
        <td>{{$row->updated_at}}</td>        
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
</div>

@endsection

