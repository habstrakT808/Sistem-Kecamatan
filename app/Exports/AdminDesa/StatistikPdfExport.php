<?php

namespace App\Exports\AdminDesa;

use App\Models\Penduduk;
use App\Models\AsetDesa;
use App\Models\AsetTanahWarga;
use App\Models\PerangkatDesa;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatistikPdfExport
{
    protected $desa_id;
    protected $tahun;

    public function __construct($desa_id, $tahun = null)
    {
        $this->desa_id = $desa_id;
        $this->tahun = $tahun ?? date('Y');
    }

    /**
     * Download PDF
     */
    public function download()
    {
        $desa = Auth::user()->desa;
        $data = $this->getStatistikDesa();
        $title = 'Statistik Desa ' . $desa->nama_desa . ' - ' . $this->tahun;
        $view = 'exports.admin-desa.statistik-pdf';
        
        $pdf = Pdf::loadView($view, [
            'data' => $data,
            'title' => $title,
            'desa' => $desa,
            'tahun' => $this->tahun,
            'tanggal' => now()->format('d F Y'),
        ]);
        
        return $pdf->download($title . '.pdf');
    }

    /**
     * Mendapatkan statistik desa
     */
    protected function getStatistikDesa()
    {
        // Statistik Penduduk
        $totalPenduduk = Penduduk::where('desa_id', $this->desa_id)->count();
        $pendudukPria = Penduduk::where('desa_id', $this->desa_id)->where('jenis_kelamin', 'L')->count();
        $pendudukWanita = Penduduk::where('desa_id', $this->desa_id)->where('jenis_kelamin', 'P')->count();
        $pendudukBerKTP = Penduduk::where('desa_id', $this->desa_id)->where('memiliki_ktp', true)->count();
        $pendudukBelumKTP = Penduduk::where('desa_id', $this->desa_id)->where('memiliki_ktp', false)->count();
        
        // Statistik Perangkat Desa
        $totalPerangkat = PerangkatDesa::where('desa_id', $this->desa_id)->where('status', 'aktif')->count();
        $perangkatPerJabatan = PerangkatDesa::where('desa_id', $this->desa_id)
            ->where('status', 'aktif')
            ->selectRaw('jabatan, COUNT(*) as jumlah')
            ->groupBy('jabatan')
            ->get();
        
        // Statistik Aset
        $totalAsetDesa = AsetDesa::where('desa_id', $this->desa_id)->count();
        $totalNilaiAsetDesa = AsetDesa::where('desa_id', $this->desa_id)->sum('nilai_sekarang');
        
        $totalAsetWarga = AsetTanahWarga::where('desa_id', $this->desa_id)->count();
        $totalNilaiAsetWarga = AsetTanahWarga::where('desa_id', $this->desa_id)
            ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
            ->value('total_nilai') ?? 0;
        
        // Klasifikasi Usia
        $klasifikasiUsia = Penduduk::where('desa_id', $this->desa_id)
            ->selectRaw('klasifikasi_usia, COUNT(*) as jumlah')
            ->groupBy('klasifikasi_usia')
            ->get();
        
        // Top Pekerjaan
        $topPekerjaan = Penduduk::where('desa_id', $this->desa_id)
            ->selectRaw('pekerjaan, COUNT(*) as jumlah')
            ->groupBy('pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->limit(5)
            ->get();
        
        // Grafik Perkembangan Bulanan
        $grafikBulanan = [];
        
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $tanggal = Carbon::createFromDate($this->tahun, $bulan, 1);
            $grafikBulanan[] = [
                'bulan' => $tanggal->format('M'),
                'penduduk' => Penduduk::where('desa_id', $this->desa_id)
                    ->whereYear('created_at', $tanggal->year)
                    ->whereMonth('created_at', $tanggal->month)
                    ->count(),
                'perangkat' => PerangkatDesa::where('desa_id', $this->desa_id)
                    ->whereYear('created_at', $tanggal->year)
                    ->whereMonth('created_at', $tanggal->month)
                    ->count(),
            ];
        }
        
        return [
            'penduduk' => [
                'total' => $totalPenduduk,
                'pria' => $pendudukPria,
                'wanita' => $pendudukWanita,
                'ber_ktp' => $pendudukBerKTP,
                'belum_ktp' => $pendudukBelumKTP,
                'klasifikasi_usia' => $klasifikasiUsia,
                'top_pekerjaan' => $topPekerjaan,
            ],
            'perangkat' => [
                'total' => $totalPerangkat,
                'per_jabatan' => $perangkatPerJabatan,
            ],
            'aset' => [
                'total_aset_desa' => $totalAsetDesa,
                'total_nilai_aset_desa' => $totalNilaiAsetDesa,
                'total_aset_warga' => $totalAsetWarga,
                'total_nilai_aset_warga' => $totalNilaiAsetWarga,
            ],
            'grafik_bulanan' => $grafikBulanan,
        ];
    }
}