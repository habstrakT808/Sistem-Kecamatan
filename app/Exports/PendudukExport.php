<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendudukExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Penduduk::with('desa');

        if (!empty($this->filters['desa_id'])) {
            $query->where('desa_id', $this->filters['desa_id']);
        }

        if (!empty($this->filters['jenis_kelamin'])) {
            $query->where('jenis_kelamin', $this->filters['jenis_kelamin']);
        }

        if (!empty($this->filters['klasifikasi_usia'])) {
            $query->where('klasifikasi_usia', $this->filters['klasifikasi_usia']);
        }

        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        return $query->orderBy('nama_lengkap')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia',
            'Agama',
            'Status Perkawinan',
            'Pekerjaan',
            'Pendidikan Terakhir',
            'Alamat',
            'RT',
            'RW',
            'Desa',
            'Memiliki KTP',
            'Tanggal Rekam KTP',
            'Klasifikasi Usia',
        ];
    }

    public function map($penduduk): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $penduduk->nik,
            $penduduk->nama_lengkap,
            $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $penduduk->tempat_lahir,
            $penduduk->tanggal_lahir->format('d/m/Y'),
            $penduduk->usia . ' tahun',
            $penduduk->agama,
            $penduduk->status_perkawinan,
            $penduduk->pekerjaan,
            $penduduk->pendidikan_terakhir,
            $penduduk->alamat,
            $penduduk->rt,
            $penduduk->rw,
            $penduduk->desa->nama_desa,
            $penduduk->memiliki_ktp ? 'Ya' : 'Tidak',
            $penduduk->tanggal_rekam_ktp ? $penduduk->tanggal_rekam_ktp->format('d/m/Y') : '-',
            $penduduk->klasifikasi_usia,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}