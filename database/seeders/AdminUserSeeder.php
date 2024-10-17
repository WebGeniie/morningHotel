<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'admin@gmail.com')->exists()) {
            User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '09066453877',
            'password' =>Hash::make('Adminuser1234'),
            'remember_token' => Str::random(10),
            'role_id' => 1,
            ]);
        }
    }
}
