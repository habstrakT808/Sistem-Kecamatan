<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
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
        'memiliki_ktp',
        'tanggal_rekam_ktp',
        'klasifikasi_usia',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'tanggal_rekam_ktp' => 'date',
            'memiliki_ktp' => 'boolean',
        ];
    }

    // Relationships
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // Helper methods
    public function getUsiaAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    public function updateKlasifikasiUsia()
    {
        $usia = $this->usia;
        
        if ($usia < 5) {
            $klasifikasi = 'Balita';
        } elseif ($usia < 13) {
            $klasifikasi = 'Anak-anak';
        } elseif ($usia < 18) {
            $klasifikasi = 'Remaja';
        } elseif ($usia < 60) {
            $klasifikasi = 'Dewasa';
        } else {
            $klasifikasi = 'Lansia';
        }

        $this->update(['klasifikasi_usia' => $klasifikasi]);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($penduduk) {
            $usia = Carbon::parse($penduduk->tanggal_lahir)->age;
            
            if ($usia < 5) {
                $penduduk->klasifikasi_usia = 'Balita';
            } elseif ($usia < 13) {
                $penduduk->klasifikasi_usia = 'Anak-anak';
            } elseif ($usia < 18) {
                $penduduk->klasifikasi_usia = 'Remaja';
            } elseif ($usia < 60) {
                $penduduk->klasifikasi_usia = 'Dewasa';
            } else {
                $penduduk->klasifikasi_usia = 'Lansia';
            }
        });
    }
}