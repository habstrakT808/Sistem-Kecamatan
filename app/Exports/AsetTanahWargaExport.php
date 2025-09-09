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
                  ->orWhere('lokasi', 'like', "%{$this->search}%")
                  ->orWhere('nomor_sertifikat', 'like', "%{$this->search}%");
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
            'Jenis Tanah',
            'Lokasi',
            'Luas (m²)',
            'Nomor Sertifikat',
            'Tanggal Sertifikat',
            'Nilai Tanah (Rp)',
            'Status Pajak',
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

        return [
            $no,
            $row->desa->nama_desa,
            $row->nama_pemilik,
            $row->jenis_tanah,
            $row->lokasi,
            $row->luas,
            $row->nomor_sertifikat,
            $row->tanggal_sertifikat ? $row->tanggal_sertifikat->format('d/m/Y') : '-',
            number_format($row->nilai_tanah, 0, ',', '.'),
            $row->status_pajak ? 'Lunas' : 'Belum Lunas',
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
            'D' => 15, // Jenis Tanah
            'E' => 30, // Lokasi
            'F' => 10, // Luas
            'G' => 20, // Nomor Sertifikat
            'H' => 15, // Tanggal Sertifikat
            'I' => 20, // Nilai Tanah
            'J' => 15, // Status Pajak
            'K' => 30, // Keterangan
        ];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:K1')->applyFromArray([
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

        $sheet->getStyle('A')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('F')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('H')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('I')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('J')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
    }
}