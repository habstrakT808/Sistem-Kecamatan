<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerangkatDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'perangkat_desa_id',
        'desa_id',
        'nama_lengkap',
        'jabatan',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'alamat',
        'no_telepon',
        'tanggal_mulai_tugas',
        'tanggal_akhir_tugas',
        'sk_pengangkatan',
        'jobdesk',
        'status',
        'action_type',
        'changed_by',
        'change_reason',
        'perubahan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'tanggal_mulai_tugas' => 'date',
            'tanggal_akhir_tugas' => 'date',
        ];
    }

    // Relationships
    public function perangkatDesa()
    {
        return $this->belongsTo(PerangkatDesa::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
    
    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}