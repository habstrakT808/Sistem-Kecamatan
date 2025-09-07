<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAsetDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'aset_desa_id',
        'desa_id',
        'kategori_aset',
        'nama_aset',
        'deskripsi',
        'nilai_perolehan',
        'nilai_sekarang',
        'tanggal_perolehan',
        'kondisi',
        'lokasi',
        'bukti_kepemilikan',
        'keterangan',
        'action_type',
        'changed_by',
        'change_reason',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_perolehan' => 'date',
            'nilai_perolehan' => 'decimal:2',
            'nilai_sekarang' => 'decimal:2',
        ];
    }

    // Relationships
    public function asetDesa()
    {
        return $this->belongsTo(AsetDesa::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}