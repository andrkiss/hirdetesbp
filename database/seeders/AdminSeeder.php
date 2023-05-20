<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User([

            'name' => 'Nevem',
            'role' => 'admin',
            'email' => 'szeldzseki@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test 123'), // password
            'remember_token' => Str::random(10)
        ]);

        $admin->save();
    }
}
