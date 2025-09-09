<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetDesa;
use App\Models\Desa;
use Carbon\Carbon;

class AsetDesaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua desa
        $desas = Desa::all();
        
        // Data kategori aset
        $kategoriAset = ['tanah', 'bangunan', 'inventaris'];
        
        // Data kondisi aset
        $kondisiAset = ['baik', 'rusak_ringan', 'rusak_berat'];
        
        // Buat data aset untuk setiap desa
        foreach ($desas as $desa) {
            // Buat 5-10 aset per desa dengan variasi data
            $jumlahAset = rand(5, 10);
            
            for ($i = 0; $i < $jumlahAset; $i++) {
                // Pilih kategori aset secara acak
                $kategori = $kategoriAset[array_rand($kategoriAset)];
                
                // Buat nama aset berdasarkan kategori
                $namaAset = $this->generateNamaAset($kategori);
                
                // Tentukan nilai perolehan dan nilai sekarang
                $nilaiPerolehan = $this->generateNilaiPerolehan($kategori);
                $nilaiSekarang = $nilaiPerolehan * (rand(50, 100) / 100); // 50-100% dari nilai perolehan
                
                // Tentukan tanggal perolehan (1-10 tahun yang lalu)
                $tanggalPerolehan = Carbon::now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30));
                
                // Tentukan kondisi berdasarkan nilai sekarang dan tanggal perolehan
                $kondisiIndex = 0; // baik
                $umurAset = Carbon::now()->diffInYears($tanggalPerolehan);
                $rasioNilai = $nilaiSekarang / $nilaiPerolehan;
                
                if ($umurAset > 5 || $rasioNilai < 0.7) {
                    $kondisiIndex = 1; // rusak_ringan
                }
                
                if ($umurAset > 8 || $rasioNilai < 0.5) {
                    $kondisiIndex = 2; // rusak_berat
                }
                
                // Buat data aset desa
                AsetDesa::create([
                    'desa_id' => $desa->id,
                    'kategori_aset' => $kategori,
                    'nama_aset' => $namaAset,
                    'deskripsi' => $this->generateDeskripsi($kategori, $namaAset),
                    'nilai_perolehan' => $nilaiPerolehan,
                    'nilai_sekarang' => $nilaiSekarang,
                    'tanggal_perolehan' => $tanggalPerolehan,
                    'kondisi' => $kondisiAset[$kondisiIndex],
                    'lokasi' => $this->generateLokasi($desa->nama_desa, $kategori),
                    'bukti_kepemilikan' => null, // Tidak ada file dalam seeder
                    'keterangan' => $this->generateKeterangan($kategori, $kondisiAset[$kondisiIndex]),
                    'is_current' => true,
                    'updated_by' => 1, // ID admin kecamatan
                ]);
            }
        }
    }
    
    // Helper untuk generate nama aset berdasarkan kategori
    private function generateNamaAset($kategori)
    {
        $namaTanah = [
            'Tanah Kantor Desa', 'Tanah Lapangan Desa', 'Tanah Pemakaman Umum', 
            'Tanah Puskesmas Pembantu', 'Tanah Posyandu', 'Tanah Balai Pertemuan', 
            'Tanah Pasar Desa', 'Tanah TPS', 'Tanah Taman Desa', 'Tanah Embung Desa'
        ];
        
        $namaBangunan = [
            'Kantor Desa', 'Balai Desa', 'Posyandu', 'Puskesmas Pembantu', 
            'Gedung PAUD', 'Gedung TK Desa', 'Gedung Perpustakaan Desa', 
            'Gedung BUMDes', 'Gedung PKK', 'Gedung Karang Taruna', 'Pos Ronda'
        ];
        
        $namaInventaris = [
            'Meja Kantor', 'Kursi Kantor', 'Lemari Arsip', 'Komputer', 'Printer', 
            'Proyektor', 'Sound System', 'Genset', 'AC', 'Kipas Angin', 'Kendaraan Dinas', 
            'Motor Dinas', 'Mesin Potong Rumput', 'Pompa Air', 'Tenda Kegiatan'
        ];
        
        switch ($kategori) {
            case 'tanah':
                return $namaTanah[array_rand($namaTanah)];
            case 'bangunan':
                return $namaBangunan[array_rand($namaBangunan)];
            case 'inventaris':
                return $namaInventaris[array_rand($namaInventaris)] . ' ' . rand(1, 5) . ' Unit';
            default:
                return 'Aset Desa';
        }
    }
    
    // Helper untuk generate nilai perolehan berdasarkan kategori
    private function generateNilaiPerolehan($kategori)
    {
        switch ($kategori) {
            case 'tanah':
                return rand(50, 500) * 1000000; // 50jt - 500jt
            case 'bangunan':
                return rand(100, 300) * 1000000; // 100jt - 300jt
            case 'inventaris':
                return rand(1, 50) * 1000000; // 1jt - 50jt
            default:
                return rand(1, 10) * 1000000; // 1jt - 10jt
        }
    }
    
    // Helper untuk generate deskripsi berdasarkan kategori dan nama
    private function generateDeskripsi($kategori, $namaAset)
    {
        $deskripsiTanah = [
            'Tanah desa yang digunakan untuk ' . strtolower(str_replace('Tanah ', '', $namaAset)),
            'Aset tanah milik desa yang berlokasi di pusat desa',
            'Tanah desa yang diperoleh dari hibah warga',
            'Tanah desa yang dibeli dari dana desa'
        ];
        
        $deskripsiBangunan = [
            'Bangunan permanen dengan struktur beton',
            'Bangunan semi permanen dengan dinding batako',
            'Bangunan kayu dengan atap seng',
            'Bangunan dengan lantai keramik dan dinding beton'
        ];
        
        $deskripsiInventaris = [
            'Inventaris kantor untuk operasional desa',
            'Peralatan pendukung kegiatan administrasi desa',
            'Aset bergerak untuk kegiatan desa',
            'Inventaris untuk pelayanan masyarakat'
        ];
        
        switch ($kategori) {
            case 'tanah':
                return $deskripsiTanah[array_rand($deskripsiTanah)];
            case 'bangunan':
                return $deskripsiBangunan[array_rand($deskripsiBangunan)];
            case 'inventaris':
                return $deskripsiInventaris[array_rand($deskripsiInventaris)];
            default:
                return 'Aset milik desa';
        }
    }
    
    // Helper untuk generate lokasi berdasarkan desa dan kategori
    private function generateLokasi($namaDesa, $kategori)
    {
        $lokasiTanah = [
            'Dusun 1', 'Dusun 2', 'Dusun 3', 'Pusat Desa', 'Pinggir Desa',
            'Dekat Pasar', 'Dekat Sekolah', 'Dekat Masjid'
        ];
        
        $lokasiBangunan = [
            'Kompleks Kantor Desa', 'Pusat Desa', 'Dusun 1', 'Dusun 2',
            'Dekat Lapangan', 'Dekat Pasar', 'Dekat Masjid'
        ];
        
        $lokasiInventaris = [
            'Kantor Desa', 'Balai Desa', 'Gudang Desa', 'Ruang Kepala Desa',
            'Ruang Sekretaris', 'Ruang Rapat', 'Ruang Pelayanan'
        ];
        
        switch ($kategori) {
            case 'tanah':
                return $lokasiTanah[array_rand($lokasiTanah)] . ', ' . $namaDesa;
            case 'bangunan':
                return $lokasiBangunan[array_rand($lokasiBangunan)] . ', ' . $namaDesa;
            case 'inventaris':
                return $lokasiInventaris[array_rand($lokasiInventaris)] . ', ' . $namaDesa;
            default:
                return 'Desa ' . $namaDesa;
        }
    }
    
    // Helper untuk generate keterangan berdasarkan kategori dan kondisi
    private function generateKeterangan($kategori, $kondisi)
    {
        $keteranganBaik = [
            'Dalam kondisi baik dan terawat',
            'Masih berfungsi dengan baik',
            'Digunakan secara rutin',
            'Pemeliharaan berkala dilakukan'
        ];
        
        $keteranganRusakRingan = [
            'Perlu perbaikan minor',
            'Beberapa bagian mulai rusak',
            'Masih bisa digunakan dengan keterbatasan',
            'Direncanakan untuk perbaikan'
        ];
        
        $keteranganRusakBerat = [
            'Perlu renovasi total',
            'Tidak bisa digunakan lagi',
            'Direncanakan untuk penggantian',
            'Sudah tidak layak pakai'
        ];
        
        switch ($kondisi) {
            case 'baik':
                return $keteranganBaik[array_rand($keteranganBaik)];
            case 'rusak_ringan':
                return $keteranganRusakRingan[array_rand($keteranganRusakRingan)];
            case 'rusak_berat':
                return $keteranganRusakBerat[array_rand($keteranganRusakBerat)];
            default:
                return 'Tidak ada keterangan';
        }
    }
}