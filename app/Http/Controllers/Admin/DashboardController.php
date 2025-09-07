<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\AsetDesa;
use App\Models\AsetTanahWarga;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Umum
        $totalDesa = Desa::count();
        $totalPenduduk = Penduduk::count();
        $totalPerangkat = PerangkatDesa::current()->where('status', 'aktif')->count();
        $totalAsetDesa = AsetDesa::current()->count();
        $totalAsetWarga = AsetTanahWarga::count();

        // Statistik Penduduk
        $pendudukPria = Penduduk::where('jenis_kelamin', 'L')->count();
        $pendudukWanita = Penduduk::where('jenis_kelamin', 'P')->count();

        // Statistik KTP
        $pendudukBerKTP = Penduduk::where('memiliki_ktp', true)->count();
        $pendudukBelumKTP = Penduduk::where('memiliki_ktp', false)->count();

        // Klasifikasi Usia
        $klasifikasiUsia = Penduduk::selectRaw('klasifikasi_usia, COUNT(*) as jumlah')
            ->groupBy('klasifikasi_usia')
            ->get();

        // Top Pekerjaan
        $topPekerjaan = Penduduk::selectRaw('pekerjaan, COUNT(*) as jumlah')
            ->groupBy('pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->limit(10)
            ->get();

        // Status Update Desa
        $desas = Desa::all();
        $statusUpdate = [
            'hijau' => 0,
            'kuning' => 0,
            'merah' => 0
        ];

        foreach ($desas as $desa) {
            $statusUpdate[$desa->status_update]++;
        }

        // Nilai Total Aset
        $totalNilaiAsetDesa = AsetDesa::current()->sum('nilai_sekarang');
        $totalNilaiAsetWarga = AsetTanahWarga::sum('nilai_tanah');

        // Data untuk grafik bulanan (6 bulan terakhir)
        $grafikBulanan = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $grafikBulanan[] = [
                'bulan' => $bulan->format('M Y'),
                'penduduk' => Penduduk::whereYear('created_at', $bulan->year)
                    ->whereMonth('created_at', $bulan->month)
                    ->count(),
                'perangkat' => PerangkatDesa::whereYear('created_at', $bulan->year)
                    ->whereMonth('created_at', $bulan->month)
                    ->count(),
            ];
        }

        return view('admin.dashboard', compact(
            'totalDesa',
            'totalPenduduk',
            'totalPerangkat',
            'totalAsetDesa',
            'totalAsetWarga',
            'pendudukPria',
            'pendudukWanita',
            'pendudukBerKTP',
            'pendudukBelumKTP',
            'klasifikasiUsia',
            'topPekerjaan',
            'statusUpdate',
            'totalNilaiAsetDesa',
            'totalNilaiAsetWarga',
            'grafikBulanan'
        ));
    }

    public function monitoring()
    {
        $desas = Desa::with(['penduduks', 'perangkatDesas'])->get();

        return view('admin.monitoring', compact('desas'));
    }

    public function statistik()
    {
        // Statistik Detail per Desa
        $statistikPerDesa = Desa::with(['penduduks', 'perangkatDesas', 'asetDesas'])
            ->get()
            ->map(function ($desa) {
                return [
                    'nama_desa' => $desa->nama_desa,
                    'total_penduduk' => $desa->penduduks->count(),
                    'penduduk_pria' => $desa->penduduks->where('jenis_kelamin', 'L')->count(),
                    'penduduk_wanita' => $desa->penduduks->where('jenis_kelamin', 'P')->count(),
                    'total_perangkat' => $desa->perangkatDesas->where('status', 'aktif')->count(),
                    'total_aset' => $desa->asetDesas->where('is_current', true)->count(),
                    'nilai_aset' => $desa->asetDesas->where('is_current', true)->sum('nilai_sekarang'),
                    'status_update' => $desa->status_update,
                ];
            });

        // Grafik Perbandingan Antar Desa
        $grafikPerbandingan = [
            'labels' => $statistikPerDesa->pluck('nama_desa')->toArray(),
            'penduduk' => $statistikPerDesa->pluck('total_penduduk')->toArray(),
            'perangkat' => $statistikPerDesa->pluck('total_perangkat')->toArray(),
            'aset' => $statistikPerDesa->pluck('total_aset')->toArray(),
        ];

        return view('admin.statistik', compact('statistikPerDesa', 'grafikPerbandingan'));
    }
}