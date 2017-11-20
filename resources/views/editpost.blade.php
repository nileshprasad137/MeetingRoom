@extends('layouts.app')
@section('content')

<h1>edit {{$post->id}}</h1>
    <div class="container">
        <form method="post" action="{{ route('posts.update', $post->id )}}">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="#postedit">Edit Post:</label>
                <textarea class="form-control" name="post_content" id="postedit" rows="5" cols="5" style="resize: none;">{{$post->post_content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish Post</button>
        </form>
    </div>
<form>


@endsection