@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif     
                    <div class="row">
                        <div class="col-md-6">                      
                            <a href="{{ route('allthreads') }}">      
                                <button type="button" class="btn btn-success">See All Discussions</button>   
                            </a>
                        </div>
                        <div class="col-md-6">                      
                            <a href="{{ route('allthreads') }}">      
                                <button type="button" class="btn btn-success">Create New Discussion</button>   
                            </a>
                        </div>
                </div>
            </div>
        </div>
        <div>
        <textarea name="editor" id="ckview" cols="10" rows="10">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis hic doloremque ex corporis provident 
            recusandae. Molestias alias dignissimos molestiae minus quia consectetur sint, maxime quidem. Repellat temporibus 
            similique iusto eaque.
        </textarea> 
        <div>
    </div>    
</div>

@endsection
<script src="{{url('tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#ckview' });</script>
