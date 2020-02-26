<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
       
        $roles = Role::all();
        $users = User::all();
        $permissions = Permission::all();
        $roles[0]->syncPermissions($permissions); //admin
        $roles[1]->givePermissionTo($permissions[0]); //writer assign write permission
        $roles[2]->givePermissionTo($permissions[1]); //editor assign write edit post permission
        $roles[3]->givePermissionTo($permissions[2]); //publisher assign publish permission

        $users[0]->assignRole($roles[0]);
        $users[1]->assignRole($roles[1]);
        $users[2]->assignRole($roles[2]);
        $users[3]->assignRole($roles[3]);
        // return $roles[0]->givePermissionTo($permission);
    }
}
