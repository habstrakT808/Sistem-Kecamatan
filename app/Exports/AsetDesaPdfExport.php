<?php

namespace App\Exports;

use App\Models\AsetDesa;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetDesaPdfExport
{
    protected $desaId;
    protected $jenis;
    protected $kondisi;
    protected $status;

    public function __construct($desaId = null, $jenis = null, $kondisi = null, $status = null)
    {
        $this->desaId = $desaId;
        $this->jenis = $jenis;
        $this->kondisi = $kondisi;
        $this->status = $status;
    }

    /**
     * Generate PDF for Aset Desa
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $query = AsetDesa::with('desa')
            ->select('aset_desas.*')
            ->orderBy('desa_id')
            ->orderBy('jenis_aset');

        if ($this->desaId) {
            $query->where('desa_id', $this->desaId);
        }

        if ($this->jenis) {
            $query->where('jenis_aset', $this->jenis);
        }

        if ($this->kondisi) {
            $query->where('kondisi', $this->kondisi);
        }

        if ($this->status !== null) {
            $query->where('status', $this->status);
        }

        $asetDesas = $query->get();
        
        // Menghitung total nilai aset
        $totalNilai = $asetDesas->sum('nilai_aset');

        $data = [
            'asetDesas' => $asetDesas,
            'totalNilai' => $totalNilai,
            'tanggal' => now()->format('d F Y'),
            'filters' => [
                'desa' => $this->desaId ? $asetDesas->first()->desa->nama_desa : 'Semua Desa',
                'jenis' => $this->jenis ?: 'Semua Jenis',
                'kondisi' => $this->kondisi ?: 'Semua Kondisi',
                'status' => $this->status !== null ? ($this->status ? 'Aktif' : 'Tidak Aktif') : 'Semua Status',
            ],
        ];

        $pdf = PDF::loadView('exports.aset-desa-pdf', $data);
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download('data-aset-desa-' . date('YmdHis') . '.pdf');
    }
}