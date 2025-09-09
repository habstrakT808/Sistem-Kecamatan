<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Desa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        $desas = [
            [
                'nama_desa' => 'Belitang Jaya',
                'kode_desa' => 'BJ001',
                'kepala_desa' => 'Budi Santoso',
                'alamat' => 'Jl. Raya Belitang Jaya No. 1',
                'kode_pos' => '30811',
                'latitude' => -2.9674,
                'longitude' => 104.7294,
                'luas_wilayah' => 25.50,
                'komoditas_unggulan' => 'Padi, Kelapa Sawit, Karet',
                'kondisi_sosial_ekonomi' => 'Mayoritas penduduk bekerja sebagai petani dan buruh perkebunan',
                'status' => 'aktif',
                'last_updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'nama_desa' => 'Sumber Makmur',
                'kode_desa' => 'SM002',
                'kepala_desa' => 'Ahmad Yani',
                'alamat' => 'Jl. Sumber Makmur No. 15',
                'kode_pos' => '30812',
                'latitude' => -2.9584,
                'longitude' => 104.7404,
                'luas_wilayah' => 30.75,
                'komoditas_unggulan' => 'Kelapa Sawit, Karet, Jagung',
                'kondisi_sosial_ekonomi' => 'Desa dengan potensi perkebunan yang baik',
                'status' => 'aktif',
                'last_updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'nama_desa' => 'Maju Bersama',
                'kode_desa' => 'MB003',
                'kepala_desa' => 'Siti Nurhaliza',
                'alamat' => 'Jl. Maju Bersama No. 8',
                'kode_pos' => '30813',
                'latitude' => -2.9784,
                'longitude' => 104.7194,
                'luas_wilayah' => 22.30,
                'komoditas_unggulan' => 'Padi, Sayuran, Perikanan',
                'kondisi_sosial_ekonomi' => 'Desa dengan sektor pertanian dan perikanan yang berkembang',
                'status' => 'aktif',
                'last_updated_at' => Carbon::now()->subDays(15),
            ],
            [
                'nama_desa' => 'Sejahtera Indah',
                'kode_desa' => 'SI004',
                'kepala_desa' => 'Rudi Hartono',
                'alamat' => 'Jl. Sejahtera No. 25',
                'kode_pos' => '30814',
                'latitude' => -2.9484,
                'longitude' => 104.7494,
                'luas_wilayah' => 28.90,
                'komoditas_unggulan' => 'Kelapa Sawit, Karet',
                'kondisi_sosial_ekonomi' => 'Desa dengan tingkat kesejahteraan yang baik',
                'status' => 'aktif',
                'last_updated_at' => Carbon::now()->subDays(35),
            ],
        ];

        foreach ($desas as $index => $desaData) {
            // Cek apakah desa sudah ada berdasarkan kode_desa
            $existingDesa = Desa::where('kode_desa', $desaData['kode_desa'])->first();
            
            if (!$existingDesa) {
                $desa = Desa::create($desaData);
                
                // Cek apakah admin desa sudah ada
                $adminEmail = 'admin.desa' . ($index + 1) . '@desa.com';
                if (!User::where('email', $adminEmail)->exists()) {
                    // Buat admin desa untuk setiap desa
                    User::create([
                        'name' => 'Admin Desa ' . $desa->nama_desa,
                        'email' => $adminEmail,
                        'password' => Hash::make('password123'),
                        'role' => 'admin_desa',
                        'desa_id' => $desa->id,
                        'phone' => '0812345678' . ($index + 1),
                        'address' => $desa->alamat,
                        'is_active' => true,
                    ]);
                }
            } else {
                // Gunakan desa yang sudah ada
                $desa = $existingDesa;
            }
        }
    }
}