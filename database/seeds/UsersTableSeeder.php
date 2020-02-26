<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Azam Hossen',
            'email' => 'azam@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Jamal',
            'email' => 'jamal@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Kamal',
            'email' => 'kamal@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Salam',
            'email' => 'salam@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
    }
}
