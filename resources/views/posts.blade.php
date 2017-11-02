@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well">Recent Posts</div>
            @foreach($posts as $row)                
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Thread ID-> {{$row->thread_id}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">By User -> {{$row->user_id}} </h6>
                        <p class="card-text">{{$row->post_content}}</p>
                        <button type="button" class="btn btn-success">Edit</button>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
