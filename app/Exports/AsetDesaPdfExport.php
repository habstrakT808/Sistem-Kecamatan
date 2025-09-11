<?php

namespace App\Exports;

use App\Models\AsetDesa;
use App\Models\Desa;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetDesaPdfExport
{
    protected $asetDesas;
    protected $desa;

    public function __construct($asetDesas, $desa)
    {
        $this->asetDesas = $asetDesas;
        $this->desa = $desa;
    }

    /**
     * Download PDF
     */
    public function download($filename = null)
    {
        if (!$filename) {
            $filename = 'aset-desa-' . date('Y-m-d') . '.pdf';
        }
        
        $pdf = Pdf::loadView('exports.aset-desa-pdf', [
            'asetDesas' => $this->asetDesas,
            'desa' => $this->desa,
            'tanggal' => now()->format('d F Y'),
        ]);
        
        return $pdf->download($filename);
    }
}