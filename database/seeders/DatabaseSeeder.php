<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'super.admin@gmail.com',
            'password' => Hash::make('12345678'),
            'password_raw' => '12345678',
            'is_admin' => true,
        ]);
    }
}
