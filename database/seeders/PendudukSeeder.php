<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Desa;
use Carbon\Carbon;

class PendudukSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua desa
        $desas = Desa::all();
        
        // Data pekerjaan untuk variasi
        $pekerjaan = [
            'Petani', 'Buruh Tani', 'Pedagang', 'Wiraswasta', 'PNS', 'Guru', 
            'Dokter', 'Perawat', 'Nelayan', 'Buruh Pabrik', 'Karyawan Swasta', 
            'Pensiunan', 'Ibu Rumah Tangga', 'Pelajar/Mahasiswa', 'Tidak Bekerja'
        ];
        
        // Data pendidikan untuk variasi
        $pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'];
        
        // Buat data penduduk untuk setiap desa
        foreach ($desas as $desa) {
            // Buat 20-30 penduduk per desa dengan variasi data
            $jumlahPenduduk = rand(20, 30);
            
            for ($i = 0; $i < $jumlahPenduduk; $i++) {
                // Tentukan jenis kelamin secara acak
                $jenisKelamin = rand(0, 1) ? 'L' : 'P';
                
                // Tentukan tanggal lahir untuk variasi usia
                // Buat variasi usia dari bayi hingga lansia
                $tahunLahir = rand(1950, 2023);
                $bulanLahir = rand(1, 12);
                $hariLahir = rand(1, 28);
                $tanggalLahir = Carbon::create($tahunLahir, $bulanLahir, $hariLahir);
                
                // Tentukan apakah memiliki KTP (hanya untuk usia >= 17 tahun)
                $usia = Carbon::now()->diffInYears($tanggalLahir);
                $memilikiKtp = $usia >= 17 ? (rand(0, 10) > 1) : false; // 90% kemungkinan punya KTP jika usia >= 17
                
                // Tanggal rekam KTP (jika punya KTP)
                $tanggalRekamKtp = $memilikiKtp ? Carbon::now()->subDays(rand(1, 365 * 3)) : null;
                
                // Status perkawinan berdasarkan usia
                $statusPerkawinan = 'Belum Kawin';
                if ($usia >= 17) {
                    $statusRand = rand(0, 10);
                    if ($usia < 25) {
                        $statusPerkawinan = $statusRand < 3 ? 'Kawin' : 'Belum Kawin';
                    } elseif ($usia < 40) {
                        $statusPerkawinan = $statusRand < 7 ? 'Kawin' : ($statusRand < 9 ? 'Belum Kawin' : 'Cerai Hidup');
                    } else {
                        $statusPerkawinan = $statusRand < 6 ? 'Kawin' : ($statusRand < 8 ? 'Cerai Hidup' : ($statusRand < 10 ? 'Cerai Mati' : 'Belum Kawin'));
                    }
                }
                
                // Pekerjaan berdasarkan usia
                $pekerjaanValue = 'Tidak Bekerja';
                if ($usia >= 18 && $usia <= 65) {
                    $pekerjaanValue = $pekerjaan[array_rand($pekerjaan)];
                } elseif ($usia > 5 && $usia < 18) {
                    $pekerjaanValue = 'Pelajar/Mahasiswa';
                }
                
                // Pendidikan berdasarkan usia
                $pendidikanValue = 'Tidak Sekolah';
                if ($usia >= 7) {
                    if ($usia < 13) {
                        $pendidikanValue = 'SD';
                    } elseif ($usia < 16) {
                        $pendidikanValue = 'SMP';
                    } elseif ($usia < 19) {
                        $pendidikanValue = 'SMA';
                    } else {
                        $pendidikanRand = rand(0, 10);
                        if ($pendidikanRand < 4) {
                            $pendidikanValue = 'SMA';
                        } elseif ($pendidikanRand < 6) {
                            $pendidikanValue = 'D3';
                        } elseif ($pendidikanRand < 9) {
                            $pendidikanValue = 'S1';
                        } else {
                            $pendidikanValue = $pendidikan[array_rand(array_slice($pendidikan, 5, 3))];
                        }
                    }
                }
                
                // Buat NIK unik
                $nik = '1' . str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT) . 
                       str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT) . 
                       rand(1, 9);
                
                // Buat data penduduk
                Penduduk::create([
                    'desa_id' => $desa->id,
                    'nik' => $nik,
                    'nama_lengkap' => $this->generateNama($jenisKelamin),
                    'jenis_kelamin' => $jenisKelamin,
                    'tempat_lahir' => $this->generateTempatLahir(),
                    'tanggal_lahir' => $tanggalLahir,
                    'agama' => $this->generateAgama(),
                    'status_perkawinan' => $statusPerkawinan,
                    'pekerjaan' => $pekerjaanValue,
                    'pendidikan_terakhir' => $pendidikanValue,
                    'alamat' => 'Dusun ' . rand(1, 5) . ', ' . $desa->nama_desa,
                    'rt' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                    'rw' => str_pad(rand(1, 5), 2, '0', STR_PAD_LEFT),
                    'memiliki_ktp' => $memilikiKtp,
                    'tanggal_rekam_ktp' => $tanggalRekamKtp,
                ]);
            }
        }
    }
    
    // Helper untuk generate nama acak
    private function generateNama($jenisKelamin)
    {
        $namaDepanLaki = [
            'Budi', 'Ahmad', 'Dedi', 'Eko', 'Faisal', 'Gunawan', 'Hendra', 'Irfan', 
            'Joko', 'Kurniawan', 'Lukman', 'Muhammad', 'Nanda', 'Oki', 'Purnomo', 
            'Rudi', 'Santoso', 'Tono', 'Umar', 'Wahyu', 'Yusuf', 'Zaenal'
        ];
        
        $namaDepanPerempuan = [
            'Ani', 'Bintang', 'Citra', 'Dewi', 'Endang', 'Fitri', 'Gita', 'Hesti', 
            'Indah', 'Juwita', 'Kartika', 'Lestari', 'Mawar', 'Nita', 'Oktavia', 
            'Putri', 'Ratna', 'Sari', 'Tari', 'Utami', 'Vina', 'Wati', 'Yanti', 'Zahra'
        ];
        
        $namaBelakang = [
            'Saputra', 'Wijaya', 'Kusuma', 'Hidayat', 'Nugraha', 'Pratama', 'Putra', 
            'Susanto', 'Santoso', 'Wibowo', 'Setiawan', 'Suryadi', 'Ramadhan', 'Permana', 
            'Kurniawan', 'Hartono', 'Gunawan', 'Firmansyah', 'Pradana', 'Utama'
        ];
        
        if ($jenisKelamin == 'L') {
            $namaDepan = $namaDepanLaki[array_rand($namaDepanLaki)];
        } else {
            $namaDepan = $namaDepanPerempuan[array_rand($namaDepanPerempuan)];
        }
        
        // 70% kemungkinan memiliki nama belakang
        if (rand(1, 10) <= 7) {
            return $namaDepan . ' ' . $namaBelakang[array_rand($namaBelakang)];
        } else {
            return $namaDepan;
        }
    }
    
    // Helper untuk generate tempat lahir acak
    private function generateTempatLahir()
    {
        $kotaLahir = [
            'Palembang', 'Prabumulih', 'Lubuk Linggau', 'Baturaja', 'Lahat', 'Pagaralam', 
            'Muara Enim', 'Kayu Agung', 'Indralaya', 'Martapura', 'Belitang', 'Muaradua'
        ];
        
        return $kotaLahir[array_rand($kotaLahir)];
    }
    
    // Helper untuk generate agama acak
    private function generateAgama()
    {
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $bobot = [85, 5, 5, 2, 2, 1]; // Persentase distribusi agama
        
        $total = array_sum($bobot);
        $rand = rand(1, $total);
        
        $count = 0;
        foreach ($bobot as $index => $value) {
            $count += $value;
            if ($rand <= $count) {
                return $agama[$index];
            }
        }
        
        return $agama[0]; // Default ke Islam jika ada masalah
    }
}