@extends('layouts.admin')

@section('page-title', 'Data Desa')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.desa.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>
        Tambah Desa
    </a>
    <a href="{{ route('admin.monitoring') }}" class="btn btn-outline-info">
        <i class="fas fa-map-marked-alt me-1"></i>
        Lihat Peta
    </a>
</div>
@endsection

@section('admin-content')
<!-- Filter dan Search -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.desa.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Pencarian</label>
                            <input type="text" class="form-control" name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Nama desa atau kepala desa...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">Semua Status</option>
                                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status Update</label>
                            <select class="form-select" name="update_status">
                                <option value="">Semua</option>
                                <option value="hijau" {{ request('update_status') == 'hijau' ? 'selected' : '' }}>Update Terbaru</option>
                                <option value="kuning" {{ request('update_status') == 'kuning' ? 'selected' : '' }}>Perlu Update</option>
                                <option value="merah" {{ request('update_status') == 'merah' ? 'selected' : '' }}>Butuh Perhatian</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">&nbsp;</label>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-light shadow-sm">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <i class="fas fa-home text-primary me-2"></i>
                    Total Desa
                </h5>
                <h2 class="text-primary mb-0">{{ $desas->count() }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Data Desa -->
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-list me-2 text-secondary"></i>
            Daftar Desa
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Desa</th>
                        <th>Kode Desa</th>
                        <th>Kepala Desa</th>
                        <th>Penduduk</th>
                        <th>Perangkat</th>
                        <th>Status Update</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($desas as $index => $desa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $desa->nama_desa }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        {{ Str::limit($desa->alamat, 30) }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $desa->kode_desa }}</span>
                        </td>
                        <td>
                            <div>
                                <strong>{{ $desa->kepala_desa }}</strong>
                                @if($desa->sk_kepala_desa)
                                    <br><small class="text-success">
                                        <i class="fas fa-file-check me-1"></i>
                                        Ada SK
                                    </small>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">
                                {{ number_format($desa->penduduks_count) }} jiwa
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-success">
                                {{ $desa->perangkat_desas_count }} orang
                            </span>
                        </td>
                        <td>
                            @php
                                $statusUpdate = $desa->status_update;
                                $statusClass = $statusUpdate == 'hijau' ? 'success' : ($statusUpdate == 'kuning' ? 'warning' : 'danger');
                                $statusText = $statusUpdate == 'hijau' ? 'Terbaru' : ($statusUpdate == 'kuning' ? 'Perlu Update' : 'Butuh Perhatian');
                            @endphp
                            <span class="badge bg-{{ $statusClass }}">
                                <i class="fas fa-circle me-1"></i>
                                {{ $statusText }}
                            </span>
                            <br>
                            <small class="text-muted">
                                @if($desa->last_updated_at)
                                    {{ $desa->last_updated_at->diffForHumans() }}
                                @else
                                    Belum pernah update
                                @endif
                            </small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $desa->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ ucfirst($desa->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.desa.show', $desa) }}" 
                                   class="btn btn-sm btn-outline-info" 
                                   data-bs-toggle="tooltip" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.desa.edit', $desa) }}" 
                                   class="btn btn-sm btn-outline-warning"
                                   data-bs-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="tooltip" title="Hapus"
                                        onclick="confirmDelete('{{ route('admin.desa.destroy', $desa) }}', 'Hapus desa {{ $desa->nama_desa }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-home fa-3x mb-3"></i>
                                <p>Belum ada data desa.</p>
                                <a href="{{ route('admin.desa.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>
                                    Tambah Desa Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(url, message) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>
@endpush