@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                  
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
                        <tr rowspan="{{count($user->getAllPermissions())}}">
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @forelse($user->getRoleNames() as $role)
                        <span>{{$role}}</span>
                            @empty 

                            @endforelse
                        </td>
                        <td>
                            @forelse($permissions as $permission)
                        <span>{{$permission->name}}</span> <span class=""><input type="checkbox" name="permission" class="js-switch" {{$user->hasPermissionTo($permission->name)?'checked':''}} name="permission" data-user_id="{{$user->id}}" data-role="{{$user->roles->first()->id}}" data-permission_id="{{$permission->id}}" ></span><br>
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

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    const elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });


});


$(document).ready(function(){
    $('.js-switch').change(function () {
        let is_revoke = $(this).prop('checked') === true ? 0 : 1;
        let user_id = $(this).data('user_id');
        let role = $(this).data('role');
        let permission_id = $(this).data('permission_id');
        $.ajax({
            type: "GET",
            dataType : 'json',
            url : "{{route('manage_role_permission')}}",
            data: {is_revoke:is_revoke,user_id:user_id,permission_id:permission_id,role:role},
            success: function (data) {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            }
        });
    });
});
</script>
@endpush