<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetTanahWarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'nama_pemilik',
        'nik_pemilik',
        'nomor_sph',
        'luas_tanah',
        'lokasi_tanah',
        'jenis_tanah',
        'status_kepemilikan',
        'nilai_tanah',
        'tanggal_sph',
        'scan_sph',
        'riwayat_kepemilikan',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_sph' => 'date',
            'luas_tanah' => 'decimal:2',
            'nilai_tanah' => 'decimal:2',
        ];
    }

    // Relationships
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // Helper methods
    public function getNilaiPerMeterAttribute()
    {
        if ($this->luas_tanah > 0 && $this->nilai_tanah > 0) {
            return $this->nilai_tanah / $this->luas_tanah;
        }
        return 0;
    }
}