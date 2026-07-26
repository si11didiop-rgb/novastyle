<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@novastyle.fr'],
            [
                'name' => 'Admin NovaStyle',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'client@novastyle.fr'],
            [
                'name' => 'Client Test',
                'password' => Hash::make('client1234'),
                'role' => 'client',
            ]
        );
    }
}