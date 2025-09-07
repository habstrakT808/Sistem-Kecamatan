<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Kecamatan
        User::create([
            'name' => 'Admin Kecamatan Belitang Jaya',
            'email' => 'admin@kecamatan.com',
            'password' => Hash::make('password123'),
            'role' => 'admin_kecamatan',
            'phone' => '081234567890',
            'address' => 'Kantor Kecamatan Belitang Jaya',
            'is_active' => true,
        ]);

        // Admin Desa (akan dibuat setelah desa ada)
    }
}