<?php

namespace App\Exports;

use App\Models\AsetTanahWarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AsetTanahWargaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $desaId;
    protected $jenis;
    protected $search;

    public function __construct($desaId = null, $jenis = null, $search = null)
    {
        $this->desaId = $desaId;
        $this->jenis = $jenis;
        $this->search = $search;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = AsetTanahWarga::with('desa')
            ->select('aset_tanah_wargas.*')
            ->orderBy('desa_id')
            ->orderBy('jenis_tanah');

        if ($this->desaId) {
            $query->where('desa_id', $this->desaId);
        }

        if ($this->jenis) {
            $query->where('jenis_tanah', $this->jenis);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('nama_pemilik', 'like', "%{$this->search}%")
                  ->orWhere('nik_pemilik', 'like', "%{$this->search}%")
                  ->orWhere('nomor_sph', 'like', "%{$this->search}%")
                  ->orWhere('lokasi', 'like', "%{$this->search}%");
            });
        }

        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Desa',
            'Nama Pemilik',
            'NIK Pemilik',
            'Nomor SPH',
            'Jenis Tanah',
            'Status Kepemilikan',
            'Luas (m²)',
            'Nilai/m² (Rp)',
            'Nilai Total (Rp)',
            'Lokasi',
            'Tanggal Perolehan',
            'Keterangan',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        static $no = 0;
        $no++;
        
        // Format jenis tanah
        $jenisTanah = str_replace('_', ' ', ucwords($row->jenis_tanah));
        
        // Format status kepemilikan
        $statusKepemilikan = str_replace('_', ' ', ucwords($row->status_kepemilikan));
        
        // Hitung nilai total
        $nilaiTotal = $row->luas_tanah * $row->nilai_per_meter;

        return [
            $no,
            $row->desa->nama_desa,
            $row->nama_pemilik,
            $row->nik_pemilik,
            $row->nomor_sph,
            $jenisTanah,
            $statusKepemilikan,
            $row->luas_tanah,
            number_format($row->nilai_per_meter, 0, ',', '.'),
            number_format($nilaiTotal, 0, ',', '.'),
            $row->lokasi,
            $row->tanggal_perolehan ? $row->tanggal_perolehan->format('d/m/Y') : '-',
            $row->keterangan,
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Data Aset Tanah Warga';
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,  // No
            'B' => 20, // Desa
            'C' => 25, // Nama Pemilik
            'D' => 20, // NIK Pemilik
            'E' => 20, // Nomor SPH
            'F' => 15, // Jenis Tanah
            'G' => 15, // Status Kepemilikan
            'H' => 10, // Luas
            'I' => 15, // Nilai/m²
            'J' => 20, // Nilai Total
            'K' => 30, // Lokasi
            'L' => 15, // Tanggal Perolehan
            'M' => 30, // Keterangan
        ];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Center align columns
        $sheet->getStyle('A')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        
        $sheet->getStyle('D')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        
        $sheet->getStyle('E')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        
        $sheet->getStyle('L')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Right align numeric columns
        $sheet->getStyle('H')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('I')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('J')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);
        
        // Format numbers
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('H2:H'.$lastRow)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('I2:J'.$lastRow)->getNumberFormat()->setFormatCode('#,##0');
    }
}