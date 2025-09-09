<?php

namespace App\Exports;

use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\AsetDesa;
use App\Models\AsetTanahWarga;
use App\Models\PerangkatDesa;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Barryvdh\DomPDF\Facade\Pdf;

class StatistikPdfExport
{
    protected $jenis;

    public function __construct($jenis = 'penduduk')
    {
        $this->jenis = $jenis;
    }

    /**
     * Download PDF
     */
    public function download()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        
        if ($this->jenis === 'penduduk') {
            $data = $this->getStatistikPenduduk($desas);
            $title = 'Statistik Penduduk';
            $view = 'exports.statistik-penduduk-pdf';
        } elseif ($this->jenis === 'aset') {
            $data = $this->getStatistikAset($desas);
            $title = 'Statistik Aset';
            $view = 'exports.statistik-aset-pdf';
        } elseif ($this->jenis === 'perangkat') {
            $data = $this->getStatistikPerangkat($desas);
            $title = 'Statistik Perangkat Desa';
            $view = 'exports.statistik-perangkat-pdf';
        } else {
            return null;
        }
        
        $pdf = Pdf::loadView($view, [
            'data' => $data,
            'title' => $title,
            'tanggal' => now()->format('d F Y'),
        ]);
        
        return $pdf->download($title . '.pdf');
    }
    
    /**
     * Mendapatkan statistik penduduk per desa
     */
    protected function getStatistikPenduduk($desas)
    {
        $result = collect([]);
        $totalAll = [
            'total_penduduk' => 0,
            'total_laki_laki' => 0,
            'total_perempuan' => 0,
            'total_kk' => 0,
            'total_balita' => 0,
            'total_lansia' => 0,
        ];
        
        foreach ($desas as $desa) {
            $totalPenduduk = Penduduk::where('desa_id', $desa->id)->count();
            $totalLakiLaki = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'L')->count();
            $totalPerempuan = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'P')->count();
            $totalKK = Penduduk::where('desa_id', $desa->id)->distinct('no_kk')->count('no_kk');
            $totalBalita = Penduduk::where('desa_id', $desa->id)->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 5')->count();
            $totalLansia = Penduduk::where('desa_id', $desa->id)->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')->count();
            
            $totalAll['total_penduduk'] += $totalPenduduk;
            $totalAll['total_laki_laki'] += $totalLakiLaki;
            $totalAll['total_perempuan'] += $totalPerempuan;
            $totalAll['total_kk'] += $totalKK;
            $totalAll['total_balita'] += $totalBalita;
            $totalAll['total_lansia'] += $totalLansia;
            
            $result->push([
                'desa' => $desa,
                'total_penduduk' => $totalPenduduk,
                'total_laki_laki' => $totalLakiLaki,
                'total_perempuan' => $totalPerempuan,
                'total_kk' => $totalKK,
                'total_balita' => $totalBalita,
                'total_lansia' => $totalLansia,
            ]);
        }
        
        return [
            'items' => $result,
            'total' => $totalAll,
        ];
    }
    
    /**
     * Mendapatkan statistik aset per desa
     */
    protected function getStatistikAset($desas)
    {
        $result = collect([]);
        $totalAll = [
            'total_aset_desa' => 0,
            'total_nilai_aset_desa' => 0,
            'total_aset_tanah' => 0,
            'total_nilai_aset_tanah' => 0,
            'total_aset' => 0,
            'total_nilai_aset' => 0,
        ];
        
        foreach ($desas as $desa) {
            $totalAsetDesa = AsetDesa::where('desa_id', $desa->id)->count();
            $totalNilaiAsetDesa = AsetDesa::where('desa_id', $desa->id)->sum('nilai_aset');
            
            $totalAsetTanah = AsetTanahWarga::where('desa_id', $desa->id)->count();
            $totalNilaiAsetTanah = AsetTanahWarga::where('desa_id', $desa->id)
                ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
                ->first()?->total_nilai ?? 0;
            
            $totalAset = $totalAsetDesa + $totalAsetTanah;
            $totalNilaiAset = $totalNilaiAsetDesa + $totalNilaiAsetTanah;
            
            $totalAll['total_aset_desa'] += $totalAsetDesa;
            $totalAll['total_nilai_aset_desa'] += $totalNilaiAsetDesa;
            $totalAll['total_aset_tanah'] += $totalAsetTanah;
            $totalAll['total_nilai_aset_tanah'] += $totalNilaiAsetTanah;
            $totalAll['total_aset'] += $totalAset;
            $totalAll['total_nilai_aset'] += $totalNilaiAset;
            
            $result->push([
                'desa' => $desa,
                'total_aset_desa' => $totalAsetDesa,
                'total_nilai_aset_desa' => $totalNilaiAsetDesa,
                'total_aset_tanah' => $totalAsetTanah,
                'total_nilai_aset_tanah' => $totalNilaiAsetTanah,
                'total_aset' => $totalAset,
                'total_nilai_aset' => $totalNilaiAset,
            ]);
        }
        
        return [
            'items' => $result,
            'total' => $totalAll,
        ];
    }
    
    /**
     * Mendapatkan statistik perangkat desa
     */
    protected function getStatistikPerangkat($desas)
    {
        $result = collect([]);
        $totalAll = [
            'total_perangkat' => 0,
            'total_aktif' => 0,
            'total_nonaktif' => 0,
        ];
        
        foreach ($desas as $desa) {
            $totalPerangkat = PerangkatDesa::where('desa_id', $desa->id)->count();
            $totalAktif = PerangkatDesa::where('desa_id', $desa->id)->where('status', 'aktif')->count();
            $totalNonaktif = PerangkatDesa::where('desa_id', $desa->id)->where('status', 'nonaktif')->count();
            
            $totalAll['total_perangkat'] += $totalPerangkat;
            $totalAll['total_aktif'] += $totalAktif;
            $totalAll['total_nonaktif'] += $totalNonaktif;
            
            $result->push([
                'desa' => $desa,
                'total_perangkat' => $totalPerangkat,
                'total_aktif' => $totalAktif,
                'total_nonaktif' => $totalNonaktif,
                'kepala_desa' => PerangkatDesa::where('desa_id', $desa->id)
                    ->where('jabatan', 'kepala_desa')
                    ->where('status', 'aktif')
                    ->first()?->nama ?? '-',
                'sekretaris_desa' => PerangkatDesa::where('desa_id', $desa->id)
                    ->where('jabatan', 'sekretaris_desa')
                    ->where('status', 'aktif')
                    ->first()?->nama ?? '-',
            ]);
        }
        
        return [
            'items' => $result,
            'total' => $totalAll,
        ];
    }
}