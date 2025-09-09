<?php

namespace App\Exports;

use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\AsetDesa;
use App\Models\AsetTanahWarga;
use App\Models\PerangkatDesa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;

class StatistikExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $jenis;

    public function __construct($jenis = 'penduduk')
    {
        $this->jenis = $jenis;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        
        if ($this->jenis === 'penduduk') {
            return $this->getStatistikPenduduk($desas);
        } elseif ($this->jenis === 'aset') {
            return $this->getStatistikAset($desas);
        } elseif ($this->jenis === 'perangkat') {
            return $this->getStatistikPerangkat($desas);
        }
        
        return collect([]);
    }
    
    /**
     * Mendapatkan statistik penduduk per desa
     */
    protected function getStatistikPenduduk($desas)
    {
        $result = collect([]);
        
        foreach ($desas as $desa) {
            $totalPenduduk = Penduduk::where('desa_id', $desa->id)->count();
            $totalLakiLaki = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'L')->count();
            $totalPerempuan = Penduduk::where('desa_id', $desa->id)->where('jenis_kelamin', 'P')->count();
            
            $result->push([
                'desa' => $desa,
                'total_penduduk' => $totalPenduduk,
                'total_laki_laki' => $totalLakiLaki,
                'total_perempuan' => $totalPerempuan,
                'total_kk' => Penduduk::where('desa_id', $desa->id)->distinct('no_kk')->count('no_kk'),
                'total_balita' => Penduduk::where('desa_id', $desa->id)->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 5')->count(),
                'total_lansia' => Penduduk::where('desa_id', $desa->id)->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')->count(),
            ]);
        }
        
        return $result;
    }
    
    /**
     * Mendapatkan statistik aset per desa
     */
    protected function getStatistikAset($desas)
    {
        $result = collect([]);
        
        foreach ($desas as $desa) {
            $totalAsetDesa = AsetDesa::where('desa_id', $desa->id)->count();
            $totalNilaiAsetDesa = AsetDesa::where('desa_id', $desa->id)->sum('nilai_aset');
            
            $totalAsetTanah = AsetTanahWarga::where('desa_id', $desa->id)->count();
            $totalNilaiAsetTanah = AsetTanahWarga::where('desa_id', $desa->id)
                ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
                ->first()?->total_nilai ?? 0;
            
            $result->push([
                'desa' => $desa,
                'total_aset_desa' => $totalAsetDesa,
                'total_nilai_aset_desa' => $totalNilaiAsetDesa,
                'total_aset_tanah' => $totalAsetTanah,
                'total_nilai_aset_tanah' => $totalNilaiAsetTanah,
                'total_aset' => $totalAsetDesa + $totalAsetTanah,
                'total_nilai_aset' => $totalNilaiAsetDesa + $totalNilaiAsetTanah,
            ]);
        }
        
        return $result;
    }
    
    /**
     * Mendapatkan statistik perangkat desa
     */
    protected function getStatistikPerangkat($desas)
    {
        $result = collect([]);
        
        foreach ($desas as $desa) {
            $totalPerangkat = PerangkatDesa::where('desa_id', $desa->id)->count();
            $totalAktif = PerangkatDesa::where('desa_id', $desa->id)->where('status', 'aktif')->count();
            $totalNonaktif = PerangkatDesa::where('desa_id', $desa->id)->where('status', 'nonaktif')->count();
            
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
        
        return $result;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        if ($this->jenis === 'penduduk') {
            return [
                'No',
                'Desa',
                'Total Penduduk',
                'Laki-laki',
                'Perempuan',
                'Total KK',
                'Balita',
                'Lansia',
            ];
        } elseif ($this->jenis === 'aset') {
            return [
                'No',
                'Desa',
                'Total Aset Desa',
                'Nilai Aset Desa (Rp)',
                'Total Aset Tanah',
                'Nilai Aset Tanah (Rp)',
                'Total Aset',
                'Total Nilai Aset (Rp)',
            ];
        } elseif ($this->jenis === 'perangkat') {
            return [
                'No',
                'Desa',
                'Total Perangkat',
                'Perangkat Aktif',
                'Perangkat Nonaktif',
                'Kepala Desa',
                'Sekretaris Desa',
            ];
        }
        
        return [];
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
        
        if ($this->jenis === 'penduduk') {
            return [
                $no,
                $row['desa']->nama_desa,
                $row['total_penduduk'],
                $row['total_laki_laki'],
                $row['total_perempuan'],
                $row['total_kk'],
                $row['total_balita'],
                $row['total_lansia'],
            ];
        } elseif ($this->jenis === 'aset') {
            return [
                $no,
                $row['desa']->nama_desa,
                $row['total_aset_desa'],
                number_format($row['total_nilai_aset_desa'], 0, ',', '.'),
                $row['total_aset_tanah'],
                number_format($row['total_nilai_aset_tanah'], 0, ',', '.'),
                $row['total_aset'],
                number_format($row['total_nilai_aset'], 0, ',', '.'),
            ];
        } elseif ($this->jenis === 'perangkat') {
            return [
                $no,
                $row['desa']->nama_desa,
                $row['total_perangkat'],
                $row['total_aktif'],
                $row['total_nonaktif'],
                $row['kepala_desa'],
                $row['sekretaris_desa'],
            ];
        }
        
        return [];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        if ($this->jenis === 'penduduk') {
            return 'Statistik Penduduk';
        } elseif ($this->jenis === 'aset') {
            return 'Statistik Aset';
        } elseif ($this->jenis === 'perangkat') {
            return 'Statistik Perangkat Desa';
        }
        
        return 'Statistik';
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        if ($this->jenis === 'penduduk') {
            return [
                'A' => 5,  // No
                'B' => 25, // Desa
                'C' => 15, // Total Penduduk
                'D' => 15, // Laki-laki
                'E' => 15, // Perempuan
                'F' => 15, // Total KK
                'G' => 15, // Balita
                'H' => 15, // Lansia
            ];
        } elseif ($this->jenis === 'aset') {
            return [
                'A' => 5,  // No
                'B' => 25, // Desa
                'C' => 15, // Total Aset Desa
                'D' => 25, // Nilai Aset Desa
                'E' => 15, // Total Aset Tanah
                'F' => 25, // Nilai Aset Tanah
                'G' => 15, // Total Aset
                'H' => 25, // Total Nilai Aset
            ];
        } elseif ($this->jenis === 'perangkat') {
            return [
                'A' => 5,  // No
                'B' => 25, // Desa
                'C' => 15, // Total Perangkat
                'D' => 15, // Perangkat Aktif
                'E' => 15, // Perangkat Nonaktif
                'F' => 25, // Kepala Desa
                'G' => 25, // Sekretaris Desa
            ];
        }
        
        return [];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:' . ($this->jenis === 'penduduk' ? 'H1' : ($this->jenis === 'aset' ? 'H1' : 'G1')))->applyFromArray([
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

        // Style untuk kolom nomor
        $sheet->getStyle('A')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Style untuk kolom angka
        if ($this->jenis === 'penduduk') {
            $sheet->getStyle('C:H')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
        } elseif ($this->jenis === 'aset') {
            $sheet->getStyle('C')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
            $sheet->getStyle('D')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ]);
            $sheet->getStyle('E')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
            $sheet->getStyle('F')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ]);
            $sheet->getStyle('G')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
            $sheet->getStyle('H')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ]);
        } elseif ($this->jenis === 'perangkat') {
            $sheet->getStyle('C:E')->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
        }
    }
}