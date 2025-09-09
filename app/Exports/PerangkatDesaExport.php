<?php

namespace App\Exports;

use App\Models\PerangkatDesa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class PerangkatDesaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $desaId;
    protected $jabatan;
    protected $status;

    public function __construct($desaId = null, $jabatan = null, $status = null)
    {
        $this->desaId = $desaId;
        $this->jabatan = $jabatan;
        $this->status = $status;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = PerangkatDesa::with('desa')
            ->select('perangkat_desas.*')
            ->orderBy('desa_id')
            ->orderBy('jabatan');

        if ($this->desaId) {
            $query->where('desa_id', $this->desaId);
        }

        if ($this->jabatan) {
            $query->where('jabatan', $this->jabatan);
        }

        if ($this->status !== null) {
            $query->where('status', $this->status);
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
            'Nama Lengkap',
            'Jabatan',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Pendidikan',
            'SK Pengangkatan',
            'Tanggal SK',
            'Status',
            'Nomor HP',
            'Tanggal Mulai',
            'Tanggal Selesai',
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
            $row->nama_lengkap,
            $row->jabatan,
            $row->nik,
            $row->tempat_lahir,
            $row->tanggal_lahir ? $row->tanggal_lahir->format('d/m/Y') : '-',
            $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $row->alamat,
            $row->pendidikan,
            $row->sk_pengangkatan,
            $row->tanggal_sk ? $row->tanggal_sk->format('d/m/Y') : '-',
            $row->status ? 'Aktif' : 'Tidak Aktif',
            $row->nomor_hp,
            $row->tanggal_mulai ? $row->tanggal_mulai->format('d/m/Y') : '-',
            $row->tanggal_selesai ? $row->tanggal_selesai->format('d/m/Y') : '-',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Data Perangkat Desa';
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,  // No
            'B' => 20, // Desa
            'C' => 25, // Nama Lengkap
            'D' => 20, // Jabatan
            'E' => 20, // NIK
            'F' => 15, // Tempat Lahir
            'G' => 15, // Tanggal Lahir
            'H' => 15, // Jenis Kelamin
            'I' => 30, // Alamat
            'J' => 15, // Pendidikan
            'K' => 20, // SK Pengangkatan
            'L' => 15, // Tanggal SK
            'M' => 10, // Status
            'N' => 15, // Nomor HP
            'O' => 15, // Tanggal Mulai
            'P' => 15, // Tanggal Selesai
        ];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:P1')->applyFromArray([
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

        $sheet->getStyle('G')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('H')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('L')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('M')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('O')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('P')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
    }
}