<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name'=>'role2']);
        // Permission::create(['name'=>'permission3']);
        // $role = Role::findById(1);
        // $permission = Permission::findById(2);
        // $role->revokePermissionTo($permission);
        // auth()->user()->givePermissionTo($permission);
        // return auth()->user()->getPermissionsViaRoles();
        // return User::permission($permission)->get();
        return view('home');
    }
}
