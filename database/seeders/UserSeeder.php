<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id_roles' => 99,
            'nama_company' => 'Test Client',
            'email' => 'test@example.com',
            'status' => 'Ready',
        ]);
        User::factory()->create([
            'id_roles' => 11,
            'nama_company' => 'Test Admin',
            'email' => 'admin@admin.com',
            'status' => 'Tidak Ready',
        ]);
    }
}
