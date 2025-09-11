@extends('layouts.admin-desa')

@section('page-title', 'Detail Aset: ' . $asetDesa->nama_aset)

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin-desa.aset-desa.edit', $asetDesa) }}" class="btn btn-warning">
        <i class="fas fa-edit me-1"></i>
        Edit
    </a>
    <a href="{{ route('admin-desa.aset-desa.riwayat', $asetDesa) }}" class="btn btn-secondary">
        <i class="fas fa-history me-1"></i>
        Riwayat
    </a>
    <a href="{{ route('admin-desa.aset-desa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>
</div>
@endsection

@section('admin-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Data Aset Desa
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Nama Aset</th>
                            <td>{{ $asetDesa->nama_aset }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>
                                @if($asetDesa->kategori_aset == 'tanah')
                                    <span class="badge bg-success">Tanah</span>
                                @elseif($asetDesa->kategori_aset == 'bangunan')
                                    <span class="badge bg-primary">Bangunan</span>
                                @elseif($asetDesa->kategori_aset == 'inventaris')
                                    <span class="badge bg-info">Inventaris</span>
                                @else
                                    <span class="badge bg-secondary">{{ $asetDesa->kategori_aset }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $asetDesa->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Perolehan</th>
                            <td>Rp {{ number_format($asetDesa->nilai_perolehan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Sekarang</th>
                            <td>Rp {{ number_format($asetDesa->nilai_sekarang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Perolehan</th>
                            <td>{{ $asetDesa->tanggal_perolehan->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>
                                @if($asetDesa->kondisi == 'baik')
                                    <span class="badge bg-success">Baik</span>
                                @elseif($asetDesa->kondisi == 'rusak_ringan')
                                    <span class="badge bg-warning text-dark">Rusak Ringan</span>
                                @elseif($asetDesa->kondisi == 'rusak_berat')
                                    <span class="badge bg-danger">Rusak Berat</span>
                                @else
                                    <span class="badge bg-secondary">{{ $asetDesa->kondisi }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $asetDesa->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $asetDesa->keterangan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Informasi Tambahan
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Desa</th>
                            <td>{{ $asetDesa->desa->nama_desa }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>{{ $asetDesa->created_at->format('d F Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diperbarui</th>
                            <td>{{ $asetDesa->updated_at->format('d F Y, H:i') }}</td>
                        </tr>
                        @if($asetDesa->updated_by)
                        <tr>
                            <th>Diperbarui Oleh</th>
                            <td>{{ $asetDesa->updatedBy->name ?? '-' }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Bukti Kepemilikan -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-file-alt me-2"></i>
                    Bukti Kepemilikan
                </h5>
            </div>
            <div class="card-body text-center">
                @if($asetDesa->bukti_kepemilikan)
                    @php
                        $extension = pathinfo(storage_path('app/public/' . $asetDesa->bukti_kepemilikan), PATHINFO_EXTENSION);
                        $isPdf = strtolower($extension) === 'pdf';
                    @endphp
                    
                    @if($isPdf)
                        <div class="mb-3">
                            <i class="fas fa-file-pdf fa-5x text-danger"></i>
                        </div>
                        <h5>Dokumen PDF</h5>
                        <a href="{{ Storage::url($asetDesa->bukti_kepemilikan) }}" target="_blank" class="btn btn-primary mt-2">
                            <i class="fas fa-eye me-1"></i> Lihat Dokumen
                        </a>
                    @else
                        <div class="mb-3">
                            <img src="{{ Storage::url($asetDesa->bukti_kepemilikan) }}" alt="Bukti Kepemilikan" class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                        <a href="{{ Storage::url($asetDesa->bukti_kepemilikan) }}" target="_blank" class="btn btn-primary mt-2">
                            <i class="fas fa-eye me-1"></i> Lihat Gambar Asli
                        </a>
                    @endif
                    
                    <p class="text-muted mt-3 mb-0">
                        <small>Terakhir diperbarui: {{ $asetDesa->updated_at->format('d F Y') }}</small>
                    </p>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-file-excel fa-4x text-muted mb-3"></i>
                        <p class="mb-0">Tidak ada dokumen bukti kepemilikan yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Foto Aset -->
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-image me-2"></i>
                    Foto Aset
                </h5>
            </div>
            <div class="card-body text-center">
                @if($asetDesa->foto)
                    <img src="{{ Storage::url($asetDesa->foto) }}" alt="Foto Aset" class="img-fluid rounded" style="max-height: 300px;">
                    <a href="{{ Storage::url($asetDesa->foto) }}" target="_blank" class="btn btn-primary mt-3">
                        <i class="fas fa-eye me-1"></i> Lihat Foto Asli
                    </a>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-camera fa-4x text-muted mb-3"></i>
                        <p class="mb-0">Tidak ada foto aset yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection