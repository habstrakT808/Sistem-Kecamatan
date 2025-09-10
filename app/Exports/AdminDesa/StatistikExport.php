<?php

namespace App\Exports\AdminDesa;

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
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class StatistikExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $desa_id;
    protected $tahun;

    public function __construct($desa_id, $tahun = null)
    {
        $this->desa_id = $desa_id;
        $this->tahun = $tahun ?? date('Y');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Statistik Penduduk
        $totalPenduduk = Penduduk::where('desa_id', $this->desa_id)->count();
        $pendudukPria = Penduduk::where('desa_id', $this->desa_id)->where('jenis_kelamin', 'L')->count();
        $pendudukWanita = Penduduk::where('desa_id', $this->desa_id)->where('jenis_kelamin', 'P')->count();
        $pendudukBerKTP = Penduduk::where('desa_id', $this->desa_id)->where('memiliki_ktp', true)->count();
        $pendudukBelumKTP = Penduduk::where('desa_id', $this->desa_id)->where('memiliki_ktp', false)->count();
        
        // Statistik Perangkat Desa
        $totalPerangkat = PerangkatDesa::where('desa_id', $this->desa_id)->where('status', 'aktif')->count();
        
        // Statistik Aset
        $totalAsetDesa = AsetDesa::where('desa_id', $this->desa_id)->count();
        $totalNilaiAsetDesa = AsetDesa::where('desa_id', $this->desa_id)->sum('nilai_sekarang');
        
        $totalAsetWarga = AsetTanahWarga::where('desa_id', $this->desa_id)->count();
        $totalNilaiAsetWarga = AsetTanahWarga::where('desa_id', $this->desa_id)
            ->selectRaw('SUM(luas_tanah * nilai_per_meter) as total_nilai')
            ->value('total_nilai') ?? 0;
        
        // Klasifikasi Usia
        $klasifikasiUsia = $this->getKlasifikasiUsia();
        
        // Top Pekerjaan
        $topPekerjaan = Penduduk::where('desa_id', $this->desa_id)
            ->selectRaw('pekerjaan, COUNT(*) as jumlah')
            ->groupBy('pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->limit(5)
            ->get();
        
        // Grafik Perangkat Desa per Jabatan
        $perangkatPerJabatan = PerangkatDesa::where('desa_id', $this->desa_id)
            ->where('status', 'aktif')
            ->selectRaw('jabatan, COUNT(*) as jumlah')
            ->groupBy('jabatan')
            ->get();
        
        // Grafik Perkembangan Bulanan
        $grafikBulanan = $this->getGrafikBulanan();
        
        // Gabungkan semua data
        return collect([
            [
                'kategori' => 'Penduduk',
                'label' => 'Total Penduduk',
                'nilai' => $totalPenduduk,
            ],
            [
                'kategori' => 'Penduduk',
                'label' => 'Penduduk Pria',
                'nilai' => $pendudukPria,
            ],
            [
                'kategori' => 'Penduduk',
                'label' => 'Penduduk Wanita',
                'nilai' => $pendudukWanita,
            ],
            [
                'kategori' => 'Penduduk',
                'label' => 'Memiliki KTP',
                'nilai' => $pendudukBerKTP,
            ],
            [
                'kategori' => 'Penduduk',
                'label' => 'Belum Memiliki KTP',
                'nilai' => $pendudukBelumKTP,
            ],
            [
                'kategori' => 'Perangkat Desa',
                'label' => 'Total Perangkat Desa Aktif',
                'nilai' => $totalPerangkat,
            ],
            [
                'kategori' => 'Aset',
                'label' => 'Total Aset Desa',
                'nilai' => $totalAsetDesa,
            ],
            [
                'kategori' => 'Aset',
                'label' => 'Total Nilai Aset Desa',
                'nilai' => $totalNilaiAsetDesa,
            ],
            [
                'kategori' => 'Aset',
                'label' => 'Total Aset Tanah Warga',
                'nilai' => $totalAsetWarga,
            ],
            [
                'kategori' => 'Aset',
                'label' => 'Total Nilai Aset Tanah Warga',
                'nilai' => $totalNilaiAsetWarga,
            ],
        ]);
    }

    /**
     * Mendapatkan klasifikasi usia penduduk
     */
    protected function getKlasifikasiUsia()
    {
        return Penduduk::where('desa_id', $this->desa_id)
            ->selectRaw('klasifikasi_usia, COUNT(*) as jumlah')
            ->groupBy('klasifikasi_usia')
            ->get();
    }

    /**
     * Mendapatkan grafik bulanan
     */
    protected function getGrafikBulanan()
    {
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
        
        return $grafikBulanan;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Kategori',
            'Label',
            'Nilai',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row['kategori'],
            $row['label'],
            is_numeric($row['nilai']) && $row['nilai'] > 1000 ? number_format($row['nilai'], 0, ',', '.') : $row['nilai'],
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Statistik Desa ' . $this->tahun;
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 30,
            'C' => 15,
        ];
    }

    /**
     * @param Worksheet $sheet
     *
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:C1')->applyFromArray([
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

        // Style untuk kolom kategori
        $sheet->getStyle('A')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ]);

        // Style untuk kolom label
        $sheet->getStyle('B')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ]);

        // Style untuk kolom nilai
        $sheet->getStyle('C')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ]);
    }
}