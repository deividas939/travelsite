<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('123'),
        ]); 

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 10,
            'password' => Hash::make('123'),
        ]);  
    }
}
