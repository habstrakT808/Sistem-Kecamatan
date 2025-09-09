@extends('layouts.admin')

@section('page-title', 'Riwayat Aset Desa')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.aset-desa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali ke Daftar
    </a>
    <a href="{{ route('admin.aset-desa.show', $asetDesa) }}" class="btn btn-info">
        <i class="fas fa-eye me-1"></i>
        Detail Aset
    </a>
</div>
@endsection

@section('admin-content')
<!-- Informasi Aset -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">{{ $asetDesa->nama_aset }}</h5>
                <p class="text-muted mb-0">{{ $asetDesa->desa->nama_desa }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="mb-1">
                    @php
                        $kategoriClass = match($asetDesa->kategori_aset) {
                            'tanah' => 'success',
                            'bangunan' => 'primary',
                            'inventaris' => 'warning',
                            default => 'secondary'
                        };
                        $kategoriText = match($asetDesa->kategori_aset) {
                            'tanah' => 'Tanah',
                            'bangunan' => 'Bangunan',
                            'inventaris' => 'Inventaris',
                            default => ucfirst($asetDesa->kategori_aset)
                        };
                    @endphp
                    <span class="badge bg-{{ $kategoriClass }}">{{ $kategoriText }}</span>
                    
                    @php
                        $kondisiClass = match($asetDesa->kondisi) {
                            'baik' => 'success',
                            'rusak_ringan' => 'warning',
                            'rusak_berat' => 'danger',
                            default => 'secondary'
                        };
                        $kondisiText = match($asetDesa->kondisi) {
                            'baik' => 'Baik',
                            'rusak_ringan' => 'Rusak Ringan',
                            'rusak_berat' => 'Rusak Berat',
                            default => ucfirst($asetDesa->kondisi)
                        };
                    @endphp
                    <span class="badge bg-{{ $kondisiClass }}">{{ $kondisiText }}</span>
                </div>
                <p class="mb-0">Nilai: Rp {{ number_format($asetDesa->nilai_sekarang, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Perubahan -->
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-history me-2"></i>
            Riwayat Perubahan
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
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $index => $item)
                        <tr>
                            <td>{{ $riwayat->firstItem() + $index }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @php
                                    $actionClass = match($item->action) {
                                        'created' => 'success',
                                        'updated' => 'warning',
                                        'deleted' => 'danger',
                                        default => 'secondary'
                                    };
                                    $actionText = match($item->action) {
                                        'created' => 'Dibuat',
                                        'updated' => 'Diperbarui',
                                        'deleted' => 'Dihapus',
                                        default => ucfirst($item->action)
                                    };
                                @endphp
                                <span class="badge bg-{{ $actionClass }}">{{ $actionText }}</span>
                            </td>
                            <td>{{ $item->changedBy->name ?? 'Sistem' }}</td>
                            <td>{{ $item->reason ?? '-' }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Modal Detail Riwayat -->
                        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Detail Riwayat - {{ $actionText }} pada {{ $item->created_at->format('d F Y, H:i') }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <h6>Data pada waktu itu:</h6>
                                                <table class="table table-sm table-bordered">
                                                    <tr>
                                                        <th width="40%">Nama Aset</th>
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
                                                                $kategoriText = match($item->kategori_aset) {
                                                                    'tanah' => 'Tanah',
                                                                    'bangunan' => 'Bangunan',
                                                                    'inventaris' => 'Inventaris',
                                                                    default => ucfirst($item->kategori_aset ?? 'Tidak diketahui')
                                                                };
                                                            @endphp
                                                            {{ $kategoriText }}
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
                                                        <th>Tanggal Perolehan</th>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d/m/Y') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kondisi</th>
                                                        <td>
                                                            @php
                                                                $kondisiText = match($item->kondisi) {
                                                                    'baik' => 'Baik',
                                                                    'rusak_ringan' => 'Rusak Ringan',
                                                                    'rusak_berat' => 'Rusak Berat',
                                                                    default => ucfirst($item->kondisi ?? 'Tidak diketahui')
                                                                };
                                                            @endphp
                                                            {{ $kondisiText }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <td>{{ $item->lokasi }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Informasi Lainnya:</h6>
                                                <table class="table table-sm table-bordered">
                                                    <tr>
                                                        <th width="40%">Waktu</th>
                                                        <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Aksi</th>
                                                        <td><span class="badge bg-{{ $actionClass }}">{{ $actionText }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dilakukan Oleh</th>
                                                        <td>{{ $item->changedBy->name ?? 'Sistem' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alasan Perubahan</th>
                                                        <td>{{ $item->reason ?? '-' }}</td>
                                                    </tr>
                                                </table>
                                                
                                                @if($item->keterangan)
                                                <div class="mt-3">
                                                    <h6>Keterangan:</h6>
                                                    <p>{{ $item->keterangan }}</p>
                                                </div>
                                                @endif
                                                
                                                @if($item->bukti_kepemilikan)
                                                <div class="mt-3">
                                                    <h6>Bukti Kepemilikan:</h6>
                                                    <p><i class="fas fa-file-alt me-1"></i> Tersedia pada waktu itu</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @if($item->action == 'updated' && $index < count($riwayat) - 1)
                                        <div class="mt-3">
                                            <h6>Perubahan:</h6>
                                            @php
                                                $previousItem = $riwayat[$index + 1] ?? null;
                                                $changes = [];
                                                
                                                if ($previousItem) {
                                                    if ($item->nama_aset != $previousItem->nama_aset) {
                                                        $changes[] = ["field" => "Nama Aset", "from" => $previousItem->nama_aset, "to" => $item->nama_aset];
                                                    }
                                                    if ($item->desa_id != $previousItem->desa_id) {
                                                        $changes[] = ["field" => "Desa", "from" => $previousItem->desa->nama_desa ?? 'Tidak diketahui', "to" => $item->desa->nama_desa ?? 'Tidak diketahui'];
                                                    }
                                                    if ($item->kategori_aset != $previousItem->kategori_aset) {
                                                        $changes[] = ["field" => "Kategori", "from" => ucfirst($previousItem->kategori_aset), "to" => ucfirst($item->kategori_aset)];
                                                    }
                                                    if ($item->nilai_perolehan != $previousItem->nilai_perolehan) {
                                                        $changes[] = ["field" => "Nilai Perolehan", "from" => "Rp " . number_format($previousItem->nilai_perolehan, 0, ',', '.'), "to" => "Rp " . number_format($item->nilai_perolehan, 0, ',', '.')];
                                                    }
                                                    if ($item->nilai_sekarang != $previousItem->nilai_sekarang) {
                                                        $changes[] = ["field" => "Nilai Sekarang", "from" => "Rp " . number_format($previousItem->nilai_sekarang, 0, ',', '.'), "to" => "Rp " . number_format($item->nilai_sekarang, 0, ',', '.')];
                                                    }
                                                    if ($item->tanggal_perolehan != $previousItem->tanggal_perolehan) {
                                                        $changes[] = ["field" => "Tanggal Perolehan", "from" => \Carbon\Carbon::parse($previousItem->tanggal_perolehan)->format('d/m/Y'), "to" => \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d/m/Y')];
                                                    }
                                                    if ($item->kondisi != $previousItem->kondisi) {
                                                        $kondisiFrom = match($previousItem->kondisi) {
                                                            'baik' => 'Baik',
                                                            'rusak_ringan' => 'Rusak Ringan',
                                                            'rusak_berat' => 'Rusak Berat',
                                                            default => ucfirst($previousItem->kondisi ?? 'Tidak diketahui')
                                                        };
                                                        $kondisiTo = match($item->kondisi) {
                                                            'baik' => 'Baik',
                                                            'rusak_ringan' => 'Rusak Ringan',
                                                            'rusak_berat' => 'Rusak Berat',
                                                            default => ucfirst($item->kondisi ?? 'Tidak diketahui')
                                                        };
                                                        $changes[] = ["field" => "Kondisi", "from" => $kondisiFrom, "to" => $kondisiTo];
                                                    }
                                                    if ($item->lokasi != $previousItem->lokasi) {
                                                        $changes[] = ["field" => "Lokasi", "from" => $previousItem->lokasi, "to" => $item->lokasi];
                                                    }
                                                    if ($item->keterangan != $previousItem->keterangan) {
                                                        $changes[] = ["field" => "Keterangan", "from" => $previousItem->keterangan ?: '-', "to" => $item->keterangan ?: '-'];
                                                    }
                                                    // Bukti kepemilikan berubah
                                                    if ($item->bukti_kepemilikan != $previousItem->bukti_kepemilikan) {
                                                        $from = $previousItem->bukti_kepemilikan ? 'Ada' : 'Tidak ada';
                                                        $to = $item->bukti_kepemilikan ? 'Ada' : 'Tidak ada';
                                                        $changes[] = ["field" => "Bukti Kepemilikan", "from" => $from, "to" => $to];
                                                    }
                                                }
                                            @endphp
                                            
                                            @if(count($changes) > 0)
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Field</th>
                                                            <th>Nilai Sebelumnya</th>
                                                            <th>Nilai Baru</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($changes as $change)
                                                        <tr>
                                                            <td>{{ $change['field'] }}</td>
                                                            <td>{{ $change['from'] }}</td>
                                                            <td>{{ $change['to'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @else
                                            <p class="text-muted">Tidak ada perubahan signifikan terdeteksi.</p>
                                            @endif
                                        </div>
                                        @endif
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
                <p class="text-muted">Belum ada riwayat perubahan untuk aset ini.</p>
            </div>
        @endif
    </div>
    
    @if($riwayat->hasPages())
    <div class="d-flex justify-content-center py-3 border-top bg-white">
        <nav aria-label="Navigasi halaman">
            {{ $riwayat->links('vendor.pagination.custom-bootstrap-5') }}
        </nav>
    </div>
    @endif
</div>
@endsection