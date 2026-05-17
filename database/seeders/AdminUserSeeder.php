<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'role' => 'administrador'
            ]
        );

        \App\Models\User::firstOrCreate(
            ['email' => 'veterinario@gmail.com'],
            [
                'name' => 'Veterinario',
                'password' => \Illuminate\Support\Facades\Hash::make('veterinario'),
                'role' => 'veterinario'
            ]
        );
    }
}
