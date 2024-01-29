<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Entry;
use App\Models\Metric;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can also manually create users
        User::create([
            'name' => 'User 1',
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User 2',
            'username' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User 3',
            'username' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
