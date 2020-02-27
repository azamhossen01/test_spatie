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
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key=>$user) 
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @forelse($user->getRoleNames() as $role)
                        <span>{{$role}}</span>
                            @empty 

                            @endforelse
                        </td>
                        <td>
                            @forelse($user->getAllPermissions() as $permission)
                        <span>{{$permission->name}}</span><br>
                            @empty 

                            @endforelse
                        </td>
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