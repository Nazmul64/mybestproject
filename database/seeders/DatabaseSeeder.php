<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'General User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Employee User',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);
    }
}
