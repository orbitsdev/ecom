<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name'=> 'Admin User',
        'email'=> 'admin@gmail.com',
        'password'=> Hash::make('password'),
        'role'=>'Admin'
        ]);
        User::create([
        'name'=> 'Anna Marries',
        'email'=> 'user2@gmail.com',
        'password'=> Hash::make('password'),
        'role'=>'Client'
        ]);
        User::create([
        'name'=> 'Ivan User',
        'email'=> 'user1@gmail.com',
        'password'=> Hash::make('password'),
        'role'=>'Client'
        ]);
    }
}
