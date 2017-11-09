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
                    <a href="{{ route('allthreads') }}">      
                        <button type="button" class="btn btn-success">See All Discussions</button>   
                    </a>                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
