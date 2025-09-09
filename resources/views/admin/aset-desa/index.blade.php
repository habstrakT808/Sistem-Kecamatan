@extends('layouts.admin')

@section('page-title', 'Data Aset Desa')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.aset-desa.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>
        Tambah Aset Desa
    </a>
</div>
@endsection

@section('admin-content')
<!-- Filter dan Search -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.aset-desa.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Pencarian</label>
                            <input type="text" class="form-control" name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Nama aset...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Desa</label>
                            <select class="form-select" name="desa_id">
                                <option value="">Semua Desa</option>
                                @foreach($desas as $desa)
                                <option value="{{ $desa->id }}" {{ request('desa_id') == $desa->id ? 'selected' : '' }}>
                                    {{ $desa->nama_desa }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori">
                                <option value="">Semua Kategori</option>
                                <option value="tanah" {{ request('kategori') == 'tanah' ? 'selected' : '' }}>Tanah</option>
                                <option value="bangunan" {{ request('kategori') == 'bangunan' ? 'selected' : '' }}>Bangunan</option>
                                <option value="inventaris" {{ request('kategori') == 'inventaris' ? 'selected' : '' }}>Inventaris</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Aset</h6>
                        <h3 class="mb-0">{{ $asetDesas->total() }}</h3>
                    </div>
                    <i class="fas fa-building fa-3x text-primary opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Daftar Aset -->
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-building me-2"></i>
            Daftar Aset Desa
        </h5>
    </div>
    <div class="card-body p-0">
        @if($asetDesas->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Aset</th>
                            <th>Desa</th>
                            <th>Kategori</th>
                            <th>Nilai Sekarang</th>
                            <th>Kondisi</th>
                            <th>Tanggal Perolehan</th>
                            <th>Riwayat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asetDesas as $index => $aset)
                        <tr>
                            <td>{{ $asetDesas->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ $aset->nama_aset }}</strong>
                                @if($aset->bukti_kepemilikan)
                                <a href="{{ asset('storage/' . $aset->bukti_kepemilikan) }}" target="_blank" class="badge bg-info text-decoration-none">
                                    <i class="fas fa-file-alt"></i> Bukti
                                </a>
                                @endif
                            </td>
                            <td>{{ $aset->desa->nama_desa }}</td>
                            <td>
                                @php
                                    $kategoriClass = match($aset->kategori_aset) {
                                        'tanah' => 'success',
                                        'bangunan' => 'primary',
                                        'inventaris' => 'warning',
                                        default => 'secondary'
                                    };
                                    $kategoriText = match($aset->kategori_aset) {
                                        'tanah' => 'Tanah',
                                        'bangunan' => 'Bangunan',
                                        'inventaris' => 'Inventaris',
                                        default => ucfirst($aset->kategori_aset)
                                    };
                                @endphp
                                <span class="badge bg-{{ $kategoriClass }}">{{ $kategoriText }}</span>
                            </td>
                            <td>Rp {{ number_format($aset->total_nilai, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $kondisiClass = match($aset->kondisi) {
                                        'baik' => 'success',
                                        'rusak_ringan' => 'warning',
                                        'rusak_berat' => 'danger',
                                        default => 'secondary'
                                    };
                                    $kondisiText = match($aset->kondisi) {
                                        'baik' => 'Baik',
                                        'rusak_ringan' => 'Rusak Ringan',
                                        'rusak_berat' => 'Rusak Berat',
                                        default => ucfirst($aset->kondisi)
                                    };
                                @endphp
                                <span class="badge bg-{{ $kondisiClass }}">{{ $kondisiText }}</span>
                            </td>
                            <td>{{ $aset->tanggal_perolehan->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.aset-desa.riwayat', $aset) }}" 
                                   class="btn btn-sm btn-outline-secondary"
                                   data-bs-toggle="tooltip" title="Lihat Riwayat">
                                    <i class="fas fa-history"></i>
                                    <span class="badge bg-secondary">{{ $aset->riwayat->count() }}</span>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.aset-desa.show', $aset) }}" 
                                       class="btn btn-sm btn-outline-info" 
                                       data-bs-toggle="tooltip" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.aset-desa.edit', $aset) }}" 
                                       class="btn btn-sm btn-outline-warning"
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal{{ $aset->id }}"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="deleteModal{{ $aset->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus aset <strong>{{ $aset->nama_aset }}</strong>?</p>
                                                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan dan akan menyimpan data ke riwayat.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.aset-desa.destroy', $aset) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data aset desa.</p>
                <a href="{{ route('admin.aset-desa.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Aset Desa
                </a>
            </div>
        @endif
    </div>
    
    @if($asetDesas->hasPages())
    <div class="d-flex justify-content-center py-3 border-top bg-white">
        <nav aria-label="Navigasi halaman">
            {{ $asetDesas->links('vendor.pagination.custom-bootstrap-5') }}
        </nav>
    </div>
    @endif
</div>
@endsection