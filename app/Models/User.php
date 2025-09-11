<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'desa_id',
        'phone',
        'address',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Relationships
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'uploaded_by');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    // Helper methods
    public function isAdminKecamatan()
    {
        return $this->role === 'admin_kecamatan';
    }

    public function isAdminDesa()
    {
        return $this->role === 'admin_desa';
    }
}