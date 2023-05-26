<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Nabnit Jha',
            'username' => 'nabnit',
            'email' => 'nabnit@jha.com',
            'password' => Hash::make('password'),
            'phone' => '9843454400',
            'role' => 'admin',
            'status' => 'active',
        ]);
        DB::table('users')->insert([
            'name' => 'Sonu Jha',
            'username' => 'sonu',
            'email' => 'sonu@jha.com',
            'password' => Hash::make('password'),
            'phone' => '9844031453',
            'role' => 'user',
            'status' => 'active',
        ]);
    }
}
