@extends('layouts.admin')

@section('page-title', 'Dashboard Admin Kecamatan')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.monitoring') }}" class="btn btn-outline-primary">
        <i class="fas fa-map-marked-alt me-1"></i>
        Monitoring Desa
    </a>
    <a href="{{ route('admin.statistik') }}" class="btn btn-outline-success">
        <i class="fas fa-chart-bar me-1"></i>
        Statistik Detail
    </a>
</div>
@endsection

@section('admin-content')
<!-- Statistik Cards -->
<div class="row mb-4">
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-primary text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">{{ $totalDesa }}</div>
                        <div class="small">Total Desa</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-success text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">{{ number_format($totalPenduduk) }}</div>
                        <div class="small">Total Penduduk</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-info text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">{{ $totalPerangkat }}</div>
                        <div class="small">Perangkat Desa</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-warning text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">{{ $totalAsetDesa }}</div>
                        <div class="small">Aset Desa</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-secondary text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">{{ $totalAsetWarga }}</div>
                        <div class="small">Aset Warga</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-map fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card bg-dark text-white card-hover shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="h4 mb-0 fw-bold">Rp {{ number_format(($totalNilaiAsetDesa + $totalNilaiAsetWarga)/1000000, 1) }}M</div>
                        <div class="small">Total Nilai Aset</div>
                    </div>
                    <div class="opacity-75">
                        <i class="fas fa-coins fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Desa & Statistik Penduduk -->
<div class="row mb-4">
    <!-- Status Update Desa -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-signal me-2 text-primary"></i>
                    Status Update Desa
                </h5>
            </div>
            <div class="card-body">
                <canvas id="statusUpdateChart" width="400" height="200"></canvas>
                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="fas fa-circle text-success me-2"></i>Update Terbaru (≤7 hari)</span>
                        <span class="badge bg-success">{{ $statusUpdate['hijau'] }} desa</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="fas fa-circle text-warning me-2"></i>Perlu Update (≤30 hari)</span>
                        <span class="badge bg-warning">{{ $statusUpdate['kuning'] }} desa</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-circle text-danger me-2"></i>Butuh Perhatian (>30 hari)</span>
                        <span class="badge bg-danger">{{ $statusUpdate['merah'] }} desa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Gender -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-venus-mars me-2 text-info"></i>
                    Statistik Gender
                </h5>
            </div>
            <div class="card-body">
                <canvas id="genderChart" width="400" height="200"></canvas>
                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="fas fa-male text-primary me-2"></i>Laki-laki</span>
                        <span class="badge bg-primary">{{ number_format($pendudukPria) }} orang</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-female text-danger me-2"></i>Perempuan</span>
                        <span class="badge bg-danger">{{ number_format($pendudukWanita) }} orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status KTP -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-id-card me-2 text-success"></i>
                    Status KTP
                </h5>
            </div>
            <div class="card-body">
                <canvas id="ktpChart" width="400" height="200"></canvas>
                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="fas fa-check-circle text-success me-2"></i>Sudah Memiliki KTP</span>
                        <span class="badge bg-success">{{ number_format($pendudukBerKTP) }} orang</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-times-circle text-danger me-2"></i>Belum Memiliki KTP</span>
                        <span class="badge bg-danger">{{ number_format($pendudukBelumKTP) }} orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Klasifikasi Usia & Top Pekerjaan -->
<div class="row mb-4">
    <!-- Klasifikasi Usia -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-users me-2 text-warning"></i>
                    Klasifikasi Usia Penduduk
                </h5>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-eye me-1"></i>Lihat Detail
                </a>
            </div>
            <div class="card-body">
                <canvas id="usiaChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Pekerjaan -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-briefcase me-2 text-secondary"></i>
                    Top 10 Pekerjaan Penduduk
                </h5>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-eye me-1"></i>Lihat Detail
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Pekerjaan</th>
                                <th>Jumlah</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topPekerjaan as $index => $pekerjaan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pekerjaan->pekerjaan }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ number_format($pekerjaan->jumlah) }} orang</span>
                                </td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" role="progressbar" 
                                             style="width: {{ ($pekerjaan->jumlah / $totalPenduduk) * 100 }}%">
                                            {{ number_format(($pekerjaan->jumlah / $totalPenduduk) * 100, 1) }}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Perkembangan Bulanan -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-line me-2 text-info"></i>
                    Perkembangan Data 6 Bulan Terakhir
                </h5>
            </div>
            <div class="card-body">
                <canvas id="perkembanganChart" width="400" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-bolt me-2 text-warning"></i>
                    Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.desa.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-plus-circle fa-2x mb-2 d-block"></i>
                            <small>Tambah Desa</small>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-user-plus fa-2x mb-2 d-block"></i>
                            <small>Tambah Penduduk</small>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.perangkat-desa.create') }}" class="btn btn-outline-info w-100 py-3">
                            <i class="fas fa-user-tie fa-2x mb-2 d-block"></i>
                            <small>Tambah Perangkat</small>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.aset-desa.create') }}" class="btn btn-outline-warning w-100 py-3">
                            <i class="fas fa-building fa-2x mb-2 d-block"></i>
                            <small>Tambah Aset Desa</small>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-secondary w-100 py-3">
                            <i class="fas fa-user-cog fa-2x mb-2 d-block"></i>
                            <small>Tambah User</small>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                        <a href="{{ route('admin.dokumen.create') }}" class="btn btn-outline-dark w-100 py-3">
                            <i class="fas fa-file-upload fa-2x mb-2 d-block"></i>
                            <small>Upload Dokumen</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Status Update Chart
    const statusCtx = document.getElementById('statusUpdateChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Update Terbaru', 'Perlu Update', 'Butuh Perhatian'],
            datasets: [{
                data: [{{ $statusUpdate['hijau'] }}, {{ $statusUpdate['kuning'] }}, {{ $statusUpdate['merah'] }}],
                backgroundColor: ['#198754', '#ffc107', '#dc3545'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Gender Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [{{ $pendudukPria }}, {{ $pendudukWanita }}],
                backgroundColor: ['#0d6efd', '#dc3545'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // KTP Chart
    const ktpCtx = document.getElementById('ktpChart').getContext('2d');
    new Chart(ktpCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sudah KTP', 'Belum KTP'],
            datasets: [{
                data: [{{ $pendudukBerKTP }}, {{ $pendudukBelumKTP }}],
                backgroundColor: ['#198754', '#dc3545'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Usia Chart
    const usiaCtx = document.getElementById('usiaChart').getContext('2d');
    new Chart(usiaCtx, {
        type: 'bar',
        data: {
            labels: {!! $klasifikasiUsia->pluck('klasifikasi_usia')->toJson() !!},
            datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! $klasifikasiUsia->pluck('jumlah')->toJson() !!},
                backgroundColor: [
                    '#ff6384',
                    '#36a2eb', 
                    '#cc65fe',
                    '#ffce56',
                    '#4bc0c0'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Perkembangan Chart
    const perkembanganCtx = document.getElementById('perkembanganChart').getContext('2d');
    new Chart(perkembanganCtx, {
        type: 'line',
        data: {
            labels: {!! collect($grafikBulanan)->pluck('bulan')->toJson() !!},
            datasets: [{
                label: 'Penduduk',
                data: {!! collect($grafikBulanan)->pluck('penduduk')->toJson() !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                tension: 0.1
            }, {
                label: 'Perangkat Desa',
                data: {!! collect($grafikBulanan)->pluck('perangkat')->toJson() !!},
                borderColor: '#198754',
                backgroundColor: 'rgba(25, 135, 84, 0.1)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endpush