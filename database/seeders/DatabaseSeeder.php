<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::create([
            'nama_role' => 'admin',
        ]);

        $mitraRole = Role::create([
            'nama_role' => 'Mitra',
        ]);

        // Create an Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => $adminRole->id, 
            'no_hp' => '085812679771',
            'password' => Hash::make('admin123'),
        ]);
    }
}
