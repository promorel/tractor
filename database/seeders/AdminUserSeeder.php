<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'tchibozomorel7@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('rh@gmail.com'),
                'email_verified_at' => now(),
            ]
        );
    }
}
