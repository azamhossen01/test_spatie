@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                    @role('writer|admin')
                <a href="{{route('posts.create')}}" class="float-right">New</a>
                    @endrole
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Body</th>
                                @can('edit post')
                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $key=>$post) 
                            <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            @can('edit post')
                            <td>
                            <a href="{{route('posts.edit',$post->id)}}">Edit</a>
                            </td>
                            @endcan
                            </tr>
                            @empty 

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
