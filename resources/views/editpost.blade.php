@extends('layouts.app')
@section('content')

<div class="container">    
    <form method="post" action="{{ route('posts.update', [$thread_id, $post->id] )}}">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="#postedit">Edit Post:</label>
            <textarea class="form-control" name="post_content" id="postedit" rows="5" cols="5" style="resize: none;">{{$post->post_content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

@endsection
<script src="{{url('js/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#postedit' });</script>