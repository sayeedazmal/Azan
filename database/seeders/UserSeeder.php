<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_name'=>'admin',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('1234'),

        ]);
        User::factory()->create([
            'name' => 'vendor',
            'email' => 'vendor@gmail.com',
            'user_name'=>'vendor',
            'role' => 'vendor',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'user_name'=>'user',
            'role' => 'user',
            'status' => 'active',
            'password' => Hash::make('1234'),

        ]);

    }
}
