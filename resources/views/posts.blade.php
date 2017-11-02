@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $row)
                <tr>
                    <td>{{$row->post_content}}</td>
                    <td>{{$row->user_id}}</td>
                    <td>{{$row->created_at}}</td>
                    <td>{{$row->job_description}}</td>
                    <td>                        
                        <button type="button" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </div>
    </div>
</div>
@endsection
