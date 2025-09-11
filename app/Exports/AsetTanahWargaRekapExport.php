<?php

namespace App\Exports;

use App\Models\AsetTanahWarga;
use App\Models\Desa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class AsetTanahWargaRekapExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $desaId;

    public function __construct($desaId = null)
    {
        $this->desaId = $desaId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = AsetTanahWarga::where('desa_id', $this->desaId)
            ->select('jenis_tanah', DB::raw('count(*) as total'), DB::raw('SUM(luas_tanah) as total_luas'), DB::raw('SUM(luas_tanah * nilai_per_meter) as total_nilai'))
            ->groupBy('jenis_tanah');

        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Jenis Tanah',
            'Jumlah SPH',
            'Persentase Jumlah',
            'Luas (m²)',
            'Persentase Luas',
            'Nilai Total (Rp)',
            'Persentase Nilai',
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
        
        // Hitung total untuk persentase
        $totalSPH = AsetTanahWarga::where('desa_id', $this->desaId)->count();
        $totalLuas = AsetTanahWarga::where('desa_id', $this->desaId)->sum('luas_tanah');
        $totalNilai = AsetTanahWarga::where('desa_id', $this->desaId)
            ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
            ->first()
            ->total_nilai ?? 0;
        
        // Hitung persentase
        $persenJumlah = $totalSPH > 0 ? ($row->total / $totalSPH) * 100 : 0;
        $persenLuas = $totalLuas > 0 ? ($row->total_luas / $totalLuas) * 100 : 0;
        $persenNilai = $totalNilai > 0 ? ($row->total_nilai / $totalNilai) * 100 : 0;

        return [
            $no,
            $jenisTanah,
            $row->total,
            number_format($persenJumlah, 2) . '%',
            $row->total_luas,
            number_format($persenLuas, 2) . '%',
            $row->total_nilai,
            number_format($persenNilai, 2) . '%',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        $desa = Desa::find($this->desaId);
        return 'Rekap Aset Tanah Warga - ' . $desa->nama_desa;
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,  // No
            'B' => 20, // Jenis Tanah
            'C' => 12, // Jumlah SPH
            'D' => 15, // Persentase Jumlah
            'E' => 15, // Luas
            'F' => 15, // Persentase Luas
            'G' => 20, // Nilai Total
            'H' => 15, // Persentase Nilai
        ];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Judul laporan
        $desa = Desa::find($this->desaId);
        $sheet->setCellValue('A1', 'REKAP ASET TANAH WARGA');
        $sheet->setCellValue('A2', 'DESA ' . strtoupper($desa->nama_desa));
        $sheet->setCellValue('A3', 'TANGGAL: ' . date('d-m-Y'));
        
        // Merge cells untuk judul
        $sheet->mergeCells('A1:H1');
        $sheet->mergeCells('A2:H2');
        $sheet->mergeCells('A3:H3');
        
        // Style untuk judul
        $sheet->getStyle('A1:A3')->getFont()->setBold(true);
        $sheet->getStyle('A1:A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        // Header tabel dimulai dari baris 5
        $sheet->getStyle('A5:H5')->applyFromArray([
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
        
        $sheet->getStyle('F')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        
        $sheet->getStyle('H')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Right align numeric columns
        $sheet->getStyle('C')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('E')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        $sheet->getStyle('G')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);
        
        // Format numbers
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('E6:E'.$lastRow)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('G6:G'.$lastRow)->getNumberFormat()->setFormatCode('#,##0');
        
        // Tambahkan total di baris terakhir
        $totalRow = $lastRow + 1;
        $sheet->setCellValue('A'.$totalRow, '');
        $sheet->setCellValue('B'.$totalRow, 'TOTAL');
        
        // Hitung total
        $totalSPH = AsetTanahWarga::where('desa_id', $this->desaId)->count();
        $totalLuas = AsetTanahWarga::where('desa_id', $this->desaId)->sum('luas_tanah');
        $totalNilai = AsetTanahWarga::where('desa_id', $this->desaId)
            ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
            ->first()
            ->total_nilai ?? 0;
            
        $sheet->setCellValue('C'.$totalRow, $totalSPH);
        $sheet->setCellValue('D'.$totalRow, '100.00%');
        $sheet->setCellValue('E'.$totalRow, $totalLuas);
        $sheet->setCellValue('F'.$totalRow, '100.00%');
        $sheet->setCellValue('G'.$totalRow, $totalNilai);
        $sheet->setCellValue('H'.$totalRow, '100.00%');
        
        // Style untuk total
        $sheet->getStyle('B'.$totalRow.':H'.$totalRow)->getFont()->setBold(true);
        $sheet->getStyle('E'.$totalRow)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('G'.$totalRow)->getNumberFormat()->setFormatCode('#,##0');
    }
}