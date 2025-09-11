@extends('layouts.admin-desa')

@section('page-title', 'Riwayat Aset Desa')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin-desa.aset-desa.show', $aset) }}" class="btn btn-info">
        <i class="fas fa-eye me-1"></i>
        Detail Aset
    </a>
    <a href="{{ route('admin-desa.aset-desa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>
</div>
@endsection

@section('admin-content')
<div class="row mb-4">
    <div class="col-lg-12">
        <!-- Informasi Aset -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Aset
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Nama Aset</th>
                            <td>{{ $aset->nama_aset }}</td>
                        </tr>
                        <tr>
                            <th>Desa</th>
                            <td>{{ $aset->desa->nama_desa }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
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
                        </tr>
                        <tr>
                            <th>Kondisi</th>
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
                        </tr>
                        <tr>
                            <th>Nilai Sekarang</th>
                            <td>Rp {{ number_format($aset->nilai_sekarang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $aset->lokasi ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Riwayat Perubahan -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-history me-2"></i>
                    Riwayat Perubahan
                </h5>
            </div>
            <div class="card-body">
                @if($riwayat->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Tanggal</th>
                                    <th width="15%">Jenis Aksi</th>
                                    <th width="20%">Diubah Oleh</th>
                                    <th width="30%">Alasan Perubahan</th>
                                    <th width="15%">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @php
                                            $actionClass = match($item->action_type) {
                                                'created' => 'success',
                                                'updated' => 'warning',
                                                'deleted' => 'danger',
                                                'create' => 'success',
                                                'update' => 'warning',
                                                'delete' => 'danger',
                                                default => 'secondary'
                                            };
                                            $actionText = match($item->action_type) {
                                                'created' => 'Dibuat',
                                                'updated' => 'Diperbarui',
                                                'deleted' => 'Dihapus',
                                                'create' => 'Dibuat',
                                                'update' => 'Diperbarui',
                                                'delete' => 'Dihapus',
                                                default => ucfirst($item->action_type)
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $actionClass }}">{{ $actionText }}</span>
                                    </td>
                                    <td>{{ $item->changedBy->name ?? 'Sistem' }}</td>
                                    <td>{{ $item->change_reason ?? '-' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                            <i class="fas fa-eye me-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-history fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada riwayat perubahan untuk aset ini.</p>
            </div>
        @endif
    </div>
</div>

<!-- Modal Detail Riwayat -->
@foreach($riwayat as $index => $item)
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">
                    <i class="fas fa-info-circle me-2"></i>
                    Detail Riwayat - {{ $item->created_at->format('d F Y, H:i') }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Data Aset -->
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">Data Aset</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="30%">Nama Aset</th>
                                    <td>{{ $item->nama_aset }}</td>
                                </tr>
                                <tr>
                                    <th>Desa</th>
                                    <td>{{ $item->desa->nama_desa ?? 'Tidak diketahui' }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>
                                        @php
                                            $kategoriClass = match($item->kategori_aset) {
                                                'tanah' => 'success',
                                                'bangunan' => 'primary',
                                                'inventaris' => 'warning',
                                                default => 'secondary'
                                            };
                                            $kategoriText = match($item->kategori_aset) {
                                                'tanah' => 'Tanah',
                                                'bangunan' => 'Bangunan',
                                                'inventaris' => 'Inventaris',
                                                default => ucfirst($item->kategori_aset)
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $kategoriClass }}">{{ $kategoriText }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kondisi</th>
                                    <td>
                                        @php
                                            $kondisiClass = match($item->kondisi) {
                                                'baik' => 'success',
                                                'rusak_ringan' => 'warning',
                                                'rusak_berat' => 'danger',
                                                default => 'secondary'
                                            };
                                            $kondisiText = match($item->kondisi) {
                                                'baik' => 'Baik',
                                                'rusak_ringan' => 'Rusak Ringan',
                                                'rusak_berat' => 'Rusak Berat',
                                                default => ucfirst($item->kondisi)
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $kondisiClass }}">{{ $kondisiText }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nilai Perolehan</th>
                                    <td>Rp {{ number_format($item->nilai_perolehan, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Sekarang</th>
                                    <td>Rp {{ number_format($item->nilai_sekarang, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $item->lokasi ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Informasi Lainnya -->
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">Informasi Lainnya</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="30%">Waktu</th>
                                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Aksi</th>
                                    <td>
                                        @php
                                            $actionClass = match($item->action_type) {
                                                'created' => 'success',
                                                'updated' => 'warning',
                                                'deleted' => 'danger',
                                                'create' => 'success',
                                                'update' => 'warning',
                                                'delete' => 'danger',
                                                default => 'secondary'
                                            };
                                            $actionText = match($item->action_type) {
                                                'created' => 'Dibuat',
                                                'updated' => 'Diperbarui',
                                                'deleted' => 'Dihapus',
                                                'create' => 'Dibuat',
                                                'update' => 'Diperbarui',
                                                'delete' => 'Dihapus',
                                                default => ucfirst($item->action_type)
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $actionClass }}">{{ $actionText }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dilakukan Oleh</th>
                                    <td>{{ $item->changedBy->name ?? 'Sistem' }}</td>
                                </tr>
                                <tr>
                                    <th>Alasan Perubahan</th>
                                    <td>{{ $item->change_reason ?? '-' }}</td>
                                </tr>
                                @if($item->keterangan)
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                                @endif
                                @if($item->bukti_kepemilikan)
                                <tr>
                                    <th>Bukti Kepemilikan</th>
                                    <td>
                                        <a href="{{ asset('uploads/bukti-aset/' . $item->bukti_kepemilikan) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-alt me-1"></i> Lihat Dokumen
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection