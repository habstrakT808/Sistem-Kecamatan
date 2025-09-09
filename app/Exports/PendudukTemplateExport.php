<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Desa;

class PendudukTemplateExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Return empty collection for template
        return collect([]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'nik',
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'status_perkawinan',
            'pekerjaan',
            'pendidikan_terakhir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'memiliki_ktp',
            'tanggal_rekam_ktp',
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        // Style for header row
        $sheet->getStyle('A1:O1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4'],
            ],
        ]);

        // Add data validation for specific columns
        $this->addDataValidation($sheet);

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 20, // NIK
            'B' => 30, // Nama Lengkap
            'C' => 15, // Jenis Kelamin
            'D' => 20, // Tempat Lahir
            'E' => 15, // Tanggal Lahir
            'F' => 15, // Agama
            'G' => 20, // Status Perkawinan
            'H' => 25, // Pekerjaan
            'I' => 25, // Pendidikan Terakhir
            'J' => 40, // Alamat
            'K' => 5,  // RT
            'L' => 5,  // RW
            'M' => 20, // Desa
            'N' => 15, // Memiliki KTP
            'O' => 20, // Tanggal Rekam KTP
        ];
    }

    /**
     * Add data validation to specific columns
     */
    private function addDataValidation(Worksheet $sheet)
    {
        // Get list of desa names
        $desas = Desa::pluck('nama_desa')->toArray();

        // Add notes to the first row
        $sheet->setCellValue('A2', 'Contoh: 3507082503990001');
        $sheet->setCellValue('B2', 'Contoh: Budi Santoso');
        $sheet->setCellValue('C2', 'Isi dengan: Laki-laki atau Perempuan');
        $sheet->setCellValue('D2', 'Contoh: Malang');
        $sheet->setCellValue('E2', 'Format: DD/MM/YYYY (contoh: 25/03/1999)');
        $sheet->setCellValue('F2', 'Contoh: Islam, Kristen, Katolik, Hindu, Buddha, Konghucu');
        $sheet->setCellValue('G2', 'Contoh: Belum Kawin, Kawin, Cerai Hidup, Cerai Mati');
        $sheet->setCellValue('H2', 'Contoh: Petani, Guru, Wiraswasta, dll');
        $sheet->setCellValue('I2', 'Contoh: SD, SMP, SMA, D3, S1, S2, S3');
        $sheet->setCellValue('J2', 'Contoh: Jl. Mawar No. 10');
        $sheet->setCellValue('K2', 'Contoh: 01');
        $sheet->setCellValue('L2', 'Contoh: 05');
        $sheet->setCellValue('M2', 'Isi dengan nama desa yang terdaftar');
        $sheet->setCellValue('N2', 'Isi dengan: Ya atau Tidak');
        $sheet->setCellValue('O2', 'Format: DD/MM/YYYY atau kosongkan jika tidak ada');

        // Style for example row
        $sheet->getStyle('A2:O2')->applyFromArray([
            'font' => [
                'italic' => true,
                'color' => ['rgb' => '808080'],
            ],
        ]);

        // Add a note about the format
        $sheet->setCellValue('A4', 'PETUNJUK PENGISIAN:');
        $sheet->setCellValue('A5', '1. Jangan mengubah format header (baris pertama)');
        $sheet->setCellValue('A6', '2. Isi data mulai dari baris ke-3');
        $sheet->setCellValue('A7', '3. Pastikan format tanggal adalah DD/MM/YYYY (contoh: 25/03/1999)');
        $sheet->setCellValue('A8', '4. Untuk jenis kelamin, isi dengan "Laki-laki" atau "Perempuan"');
        $sheet->setCellValue('A9', '5. Untuk memiliki KTP, isi dengan "Ya" atau "Tidak"');
        $sheet->setCellValue('A10', '6. Nama desa harus sesuai dengan yang terdaftar di sistem');
        
        // Merge cells for the note
        $sheet->mergeCells('A4:O4');
        $sheet->mergeCells('A5:O5');
        $sheet->mergeCells('A6:O6');
        $sheet->mergeCells('A7:O7');
        $sheet->mergeCells('A8:O8');
        $sheet->mergeCells('A9:O9');
        $sheet->mergeCells('A10:O10');
        
        // Style for notes
        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
        ]);
        
        $sheet->getStyle('A5:A10')->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
            ],
        ]);

        // List available desa
        $sheet->setCellValue('A12', 'Daftar Desa yang Tersedia:');
        $sheet->getStyle('A12')->applyFromArray([
            'font' => ['bold' => true],
        ]);
        
        foreach ($desas as $index => $desa) {
            $sheet->setCellValue('A' . (13 + $index), $desa);
        }
    }
}