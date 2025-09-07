@extends('layouts.admin')

@section('page-title', 'Riwayat Perangkat: ' . $perangkat->nama_lengkap)

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.perangkat-desa.show', $perangkat) }}" class="btn btn-info">
        <i class="fas fa-eye me-1"></i>
        Lihat Detail
    </a>
    <a href="{{ route('admin.perangkat-desa.edit', $perangkat) }}" class="btn btn-warning">
        <i class="fas fa-edit me-1"></i>
        Edit
    </a>
    <a href="{{ route('admin.perangkat-desa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>
</div>
@endsection

@section('admin-content')
<!-- Info Perangkat -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-user-tie me-2"></i>
            Informasi Perangkat
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <strong>Nama:</strong><br>
                {{ $perangkat->nama_lengkap }}
            </div>
            <div class="col-md-3">
                <strong>Jabatan:</strong><br>
                <span class="badge bg-primary">{{ $perangkat->jabatan }}</span>
            </div>
            <div class="col-md-3">
                <strong>Desa:</strong><br>
                {{ $perangkat->desa->nama_desa }}
            </div>
            <div class="col-md-3">
                <strong>Status:</strong><br>
                <span class="badge bg-{{ $perangkat->status == 'aktif' ? 'success' : 'secondary' }}">
                    {{ ucfirst($perangkat->status) }}
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Perubahan -->
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-history me-2"></i>
            Riwayat Perubahan Data ({{ $riwayat->total() }} record)
        </h5>
    </div>
    <div class="card-body p-0">
        @if($riwayat->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Aksi</th>
                            <th>Diubah Oleh</th>
                            <th>Alasan Perubahan</th>
                            <th>Detail Perubahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $index => $history)
                        <tr>
                            <td>{{ $riwayat->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ $history->created_at->format('d/m/Y') }}</strong><br>
                                <small class="text-muted">{{ $history->created_at->format('H:i:s') }}</small><br>
                                <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                @php
                                    $badgeClass = match($history->action_type) {
                                        'created' => 'success',
                                        'updated' => 'warning',
                                        'deleted' => 'danger',
                                        default => 'secondary'
                                    };
                                    $actionText = match($history->action_type) {
                                        'created' => 'Dibuat',
                                        'updated' => 'Diperbarui',
                                        'deleted' => 'Dihapus',
                                        default => ucfirst($history->action_type)
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }}">
                                    <i class="fas fa-{{ $history->action_type == 'created' ? 'plus' : ($history->action_type == 'updated' ? 'edit' : 'trash') }} me-1"></i>
                                    {{ $actionText }}
                                </span>
                            </td>
                            <td>
                                @if($history->changedBy)
                                    <strong>{{ $history->changedBy->name }}</strong><br>
                                    <small class="text-muted">{{ $history->changedBy->email }}</small>
                                @else
                                    <span class="text-muted">System</span>
                                @endif
                            </td>
                            <td>
                                @if($history->change_reason)
                                    <span class="text-muted">{{ $history->change_reason }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-info" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal{{ $history->id }}">
                                    <i class="fas fa-eye me-1"></i>
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailModal{{ $history->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Detail Perubahan - {{ $history->created_at->format('d/m/Y H:i:s') }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Data Pada Waktu Itu:</h6>
                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <td><strong>Nama:</strong></td>
                                                        <td>{{ $history->nama_lengkap }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Jabatan:</strong></td>
                                                        <td>{{ $history->jabatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>NIK:</strong></td>
                                                        <td>{{ $history->nik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Jenis Kelamin:</strong></td>
                                                        <td>{{ $history->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tempat Lahir:</strong></td>
                                                        <td>{{ $history->tempat_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tanggal Lahir:</strong></td>
                                                        <td>{{ \Carbon\Carbon::parse($history->tanggal_lahir)->format('d/m/Y') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Pendidikan:</strong></td>
                                                        <td>{{ $history->pendidikan_terakhir }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Informasi Lainnya:</h6>
                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <td><strong>No. Telepon:</strong></td>
                                                        <td>{{ $history->no_telepon ?: '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Alamat:</strong></td>
                                                        <td>{{ $history->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Mulai Tugas:</strong></td>
                                                        <td>{{ \Carbon\Carbon::parse($history->tanggal_mulai_tugas)->format('d/m/Y') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Akhir Tugas:</strong></td>
                                                        <td>
                                                            @if($history->tanggal_akhir_tugas)
                                                                {{ \Carbon\Carbon::parse($history->tanggal_akhir_tugas)->format('d/m/Y') }}
                                                            @else
                                                                Masih Aktif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status:</strong></td>
                                                        <td>
                                                            <span class="badge bg-{{ $history->status == 'aktif' ? 'success' : 'secondary' }}">
                                                                {{ ucfirst($history->status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>SK Pengangkatan:</strong></td>
                                                        <td>{{ $history->sk_pengangkatan ? 'Ada' : 'Tidak Ada' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        @if($history->jobdesk)
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <h6 class="fw-bold">Job Description:</h6>
                                                <p class="text-muted">{{ $history->jobdesk }}</p>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <h6 class="fw-bold">Informasi Perubahan:</h6>
                                                <table class="table table-sm">
                                                    <tr>
                                                        <td><strong>Jenis Aksi:</strong></td>
                                                        <td>
                                                            <span class="badge bg-{{ $badgeClass }}">{{ $actionText }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Diubah Oleh:</strong></td>
                                                        <td>{{ $history->changedBy ? $history->changedBy->name : 'System' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Alasan:</strong></td>
                                                        <td>{{ $history->change_reason ?: '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Waktu:</strong></td>
                                                        <td>{{ $history->created_at->format('d F Y, H:i:s') }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-history fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada riwayat perubahan data.</p>
            </div>
        @endif
    </div>
    
    @if($riwayat->hasPages())
    <div class="card-footer">
        {{ $riwayat->links() }}
    </div>
    @endif
</div>
@endsection