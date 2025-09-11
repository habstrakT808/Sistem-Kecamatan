@extends('layouts.admin-desa')

@section('page-title')
    Detail Penduduk
@endsection

@section('page-actions')
    <a href="{{ route('admin-desa.penduduk.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <a href="{{ route('admin-desa.penduduk.edit', $penduduk->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Edit
    </a>
@endsection

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-user-circle me-2"></i>Informasi Penduduk</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-id-card me-1"></i> NIK</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->nik }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->nama_lengkap }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-venus-mars me-1"></i> Jenis Kelamin</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-map-marker-alt me-1"></i> Tempat Lahir</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->tempat_lahir }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-calendar-alt me-1"></i> Tanggal Lahir</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->tanggal_lahir->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-birthday-cake me-1"></i> Usia</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->usia }} tahun ({{ $penduduk->klasifikasi_usia }})</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-pray me-1"></i> Agama</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->agama }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-ring me-1"></i> Status Perkawinan</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->status_perkawinan }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-briefcase me-1"></i> Pekerjaan</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->pekerjaan }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-graduation-cap me-1"></i> Pendidikan Terakhir</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->pendidikan_terakhir }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-home me-1"></i> Alamat</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->alamat }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-map-signs me-1"></i> RT</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->rt }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-map-signs me-1"></i> RW</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->rw }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-id-card-alt me-1"></i> Memiliki KTP</label>
                                <p class="form-control-plaintext border-bottom">
                                    @if($penduduk->memiliki_ktp)
                                        <span class="badge bg-success">Ya</span>
                                    @else
                                        <span class="badge bg-danger">Tidak</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-calendar-check me-1"></i> Tanggal Rekam KTP</label>
                                <p class="form-control-plaintext border-bottom">
                                    {{ $penduduk->tanggal_rekam_ktp ? $penduduk->tanggal_rekam_ktp->format('d F Y') : '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-city me-1"></i> Desa</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->desa->nama_desa }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold"><i class="fas fa-clock me-1"></i> Terakhir Diperbarui</label>
                                <p class="form-control-plaintext border-bottom">{{ $penduduk->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('admin-desa.penduduk.index') }}" class="btn btn-secondary me-1">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <a href="{{ route('admin-desa.penduduk.edit', $penduduk->id) }}" class="btn btn-warning me-1">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel"><i class="fas fa-exclamation-triangle text-danger me-1"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data penduduk <strong>{{ $penduduk->nama_lengkap }}</strong>?</p>
                    <p class="text-danger"><small><i class="fas fa-info-circle me-1"></i> Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Batal</button>
                    <form action="{{ route('admin-desa.penduduk.destroy', $penduduk->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt me-1"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection