<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role' => 'guru'
        ]);

        Role::create([
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'abdullah',
            'password' => bcrypt('malakaji'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('malakaji'),
            'role_id' => 2
        ]);
    }
}
