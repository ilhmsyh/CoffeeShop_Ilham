<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nama Pengguna',
            'email' => 'email@example.com',
            'password' => Hash::make('password123'),  // Password terenkripsi
        ]);
    }
}
