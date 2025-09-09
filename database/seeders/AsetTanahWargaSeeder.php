<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetTanahWarga;
use App\Models\Desa;
use Carbon\Carbon;

class AsetTanahWargaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua desa
        $desas = Desa::all();
        
        // Data jenis tanah
        $jenisTanah = ['tanah_kering', 'tanah_sawah', 'tanah_pekarangan', 'tanah_perkebunan'];
        
        // Data status kepemilikan
        $statusKepemilikan = ['milik_sendiri', 'warisan', 'hibah', 'jual_beli'];
        
        // Buat data aset tanah warga untuk setiap desa
        foreach ($desas as $desa) {
            // Buat 8-15 aset tanah warga per desa
            $jumlahAset = rand(8, 15);
            
            for ($i = 0; $i < $jumlahAset; $i++) {
                // Pilih jenis tanah secara acak
                $jenis = $jenisTanah[array_rand($jenisTanah)];
                
                // Tentukan luas tanah berdasarkan jenis
                $luasTanah = $this->generateLuasTanah($jenis);
                
                // Tentukan nilai per meter berdasarkan jenis
                $nilaiPerMeter = $this->generateNilaiPerMeter($jenis);
                
                // Tentukan tanggal perolehan (1-20 tahun yang lalu)
                $tanggalPerolehan = Carbon::now()->subYears(rand(1, 20))->subMonths(rand(0, 11))->subDays(rand(0, 30));
                
                // Buat nomor SPH (Surat Pernyataan Hak)
                $nomorSPH = 'SPH/' . strtoupper(substr($desa->nama_desa, 0, 3)) . '/' . rand(100, 999) . '/' . $tanggalPerolehan->format('Y');
                
                // Buat data aset tanah warga
                AsetTanahWarga::create([
                    'desa_id' => $desa->id,
                    'nama_pemilik' => $this->generateNamaPemilik(),
                    'nik_pemilik' => $this->generateNIK(),
                    'nomor_sph' => $nomorSPH,
                    'jenis_tanah' => $jenis,
                    'status_kepemilikan' => $statusKepemilikan[array_rand($statusKepemilikan)],
                    'luas_tanah' => $luasTanah,
                    'nilai_per_meter' => $nilaiPerMeter,
                    'lokasi' => $this->generateLokasi($desa->nama_desa),
                    'keterangan' => $this->generateKeterangan($jenis),
                    'tanggal_perolehan' => $tanggalPerolehan,
                    'bukti_kepemilikan' => null, // Tidak ada file dalam seeder
                ]);
            }
        }
    }
    
    // Helper untuk generate luas tanah berdasarkan jenis
    private function generateLuasTanah($jenis)
    {
        switch ($jenis) {
            case 'tanah_kering':
                return rand(100, 500) / 100; // 1 - 5 hektar
            case 'tanah_sawah':
                return rand(50, 300) / 100; // 0.5 - 3 hektar
            case 'tanah_pekarangan':
                return rand(1, 10) / 10; // 0.1 - 1 hektar
            case 'tanah_perkebunan':
                return rand(200, 1000) / 100; // 2 - 10 hektar
            default:
                return rand(100, 500) / 100; // 1 - 5 hektar
        }
    }
    
    // Helper untuk generate nilai per meter berdasarkan jenis
    private function generateNilaiPerMeter($jenis)
    {
        switch ($jenis) {
            case 'tanah_kering':
                return rand(50, 200) * 1000; // Rp 50rb - 200rb per meter
            case 'tanah_sawah':
                return rand(100, 300) * 1000; // Rp 100rb - 300rb per meter
            case 'tanah_pekarangan':
                return rand(300, 800) * 1000; // Rp 300rb - 800rb per meter
            case 'tanah_perkebunan':
                return rand(80, 250) * 1000; // Rp 80rb - 250rb per meter
            default:
                return rand(100, 300) * 1000; // Rp 100rb - 300rb per meter
        }
    }
    
    // Helper untuk generate nama pemilik
    private function generateNamaPemilik()
    {
        $namaDepan = [
            'Budi', 'Ahmad', 'Dedi', 'Eko', 'Faisal', 'Gunawan', 'Hendra', 'Irfan', 
            'Joko', 'Kurniawan', 'Lukman', 'Muhammad', 'Nanda', 'Oki', 'Purnomo', 
            'Rudi', 'Santoso', 'Tono', 'Umar', 'Wahyu', 'Yusuf', 'Zaenal',
            'Ani', 'Bintang', 'Citra', 'Dewi', 'Endang', 'Fitri', 'Gita', 'Hesti', 
            'Indah', 'Juwita', 'Kartika', 'Lestari', 'Mawar', 'Nita', 'Oktavia', 
            'Putri', 'Ratna', 'Sari', 'Tari', 'Utami', 'Vina', 'Wati', 'Yanti', 'Zahra'
        ];
        
        $namaBelakang = [
            'Saputra', 'Wijaya', 'Kusuma', 'Hidayat', 'Nugraha', 'Pratama', 'Putra', 
            'Susanto', 'Santoso', 'Wibowo', 'Setiawan', 'Suryadi', 'Ramadhan', 'Permana', 
            'Kurniawan', 'Hartono', 'Gunawan', 'Firmansyah', 'Pradana', 'Utama'
        ];
        
        $namaDepanRandom = $namaDepan[array_rand($namaDepan)];
        
        // 80% kemungkinan memiliki nama belakang
        if (rand(1, 10) <= 8) {
            return $namaDepanRandom . ' ' . $namaBelakang[array_rand($namaBelakang)];
        } else {
            return $namaDepanRandom;
        }
    }
    
    // Helper untuk generate NIK
    private function generateNIK()
    {
        return '1' . str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT) . 
               str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT) . 
               rand(1, 9);
    }
    
    // Helper untuk generate lokasi
    private function generateLokasi($namaDesa)
    {
        $lokasi = [
            'Dusun 1', 'Dusun 2', 'Dusun 3', 'Dusun 4', 'Dusun 5',
            'RT 01/RW 01', 'RT 02/RW 01', 'RT 03/RW 02', 'RT 04/RW 02',
            'Blok A', 'Blok B', 'Blok C', 'Blok D',
            'Sebelah Utara Desa', 'Sebelah Selatan Desa', 'Sebelah Timur Desa', 'Sebelah Barat Desa',
            'Dekat Sungai', 'Dekat Jalan Raya', 'Dekat Pasar', 'Dekat Sekolah'
        ];
        
        return $lokasi[array_rand($lokasi)] . ', ' . $namaDesa;
    }
    
    // Helper untuk generate keterangan berdasarkan jenis tanah
    private function generateKeterangan($jenis)
    {
        $keteranganTanahKering = [
            'Tanah kering yang cocok untuk pembangunan',
            'Belum dimanfaatkan secara optimal',
            'Direncanakan untuk pengembangan usaha',
            'Tanah kering dengan akses jalan yang baik'
        ];
        
        $keteranganTanahSawah = [
            'Sawah produktif dengan irigasi teknis',
            'Sawah dengan panen 2-3 kali setahun',
            'Sawah dengan sumber air yang baik',
            'Sawah yang dikelola secara tradisional'
        ];
        
        $keteranganTanahPekarangan = [
            'Pekarangan rumah dengan tanaman produktif',
            'Pekarangan yang terawat dengan baik',
            'Pekarangan dengan potensi pengembangan',
            'Pekarangan dengan tanaman hias'
        ];
        
        $keteranganTanahPerkebunan = [
            'Perkebunan karet yang produktif',
            'Perkebunan kelapa sawit yang menghasilkan',
            'Perkebunan campuran dengan berbagai tanaman',
            'Perkebunan dengan potensi pengembangan'
        ];
        
        switch ($jenis) {
            case 'tanah_kering':
                return $keteranganTanahKering[array_rand($keteranganTanahKering)];
            case 'tanah_sawah':
                return $keteranganTanahSawah[array_rand($keteranganTanahSawah)];
            case 'tanah_pekarangan':
                return $keteranganTanahPekarangan[array_rand($keteranganTanahPekarangan)];
            case 'tanah_perkebunan':
                return $keteranganTanahPerkebunan[array_rand($keteranganTanahPerkebunan)];
            default:
                return 'Tanah dengan potensi pengembangan';
        }
    }
}