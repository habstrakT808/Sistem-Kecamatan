@extends('layouts.admin')

@section('page-title', 'Statistik Detail')

@section('page-actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fas fa-download me-1"></i>
            Export
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.excel', ['jenis' => 'penduduk']) }}">
                <i class="fas fa-file-excel me-2"></i>Excel - Penduduk
            </a></li>
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.excel', ['jenis' => 'aset']) }}">
                <i class="fas fa-file-excel me-2"></i>Excel - Aset
            </a></li>
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.excel', ['jenis' => 'perangkat']) }}">
                <i class="fas fa-file-excel me-2"></i>Excel - Perangkat
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.pdf', ['jenis' => 'penduduk']) }}">
                <i class="fas fa-file-pdf me-2"></i>PDF - Penduduk
            </a></li>
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.pdf', ['jenis' => 'aset']) }}">
                <i class="fas fa-file-pdf me-2"></i>PDF - Aset
            </a></li>
            <li><a class="dropdown-item" href="{{ route('admin.statistik.export.pdf', ['jenis' => 'perangkat']) }}">
                <i class="fas fa-file-pdf me-2"></i>PDF - Perangkat
            </a></li>
        </ul>
    </div>
</div>
@endsection

@section('admin-content')
<!-- Ringkasan Statistik -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-pie me-2 text-primary"></i>
                    Ringkasan Statistik Kecamatan
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($statistikPerDesa as $desa)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-{{ $desa['status_update'] }} text-white">
                                <h6 class="mb-0">{{ $desa['nama_desa'] }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <h4 class="mb-0">{{ number_format($desa['total_penduduk']) }}</h4>
                                        <small class="text-muted">Penduduk</small>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="mb-0">{{ number_format($desa['total_perangkat']) }}</h4>
                                        <small class="text-muted">Perangkat</small>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="mb-0">{{ number_format($desa['total_aset']) }}</h4>
                                        <small class="text-muted">Aset</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span><i class="fas fa-male text-primary"></i> {{ number_format($desa['penduduk_pria']) }}</span>
                                    <span><i class="fas fa-female text-danger"></i> {{ number_format($desa['penduduk_wanita']) }}</span>
                                    <span><i class="fas fa-coins text-warning"></i> {{ number_format($desa['nilai_aset']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Perbandingan Antar Desa -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-bar me-2 text-success"></i>
                    Perbandingan Antar Desa
                </h5>
            </div>
            <div class="card-body">
                <canvas id="perbandinganDesaChart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart Penduduk & Aset -->
<div class="row mb-4">
    <!-- Chart Klasifikasi Usia -->
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-users me-2 text-warning"></i>
                    Klasifikasi Usia Penduduk
                </h5>
            </div>
            <div class="card-body">
                <canvas id="klasifikasiUsiaChart" height="250"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Chart Pekerjaan -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-briefcase me-2 text-info"></i>
                    Top 5 Pekerjaan Penduduk
                </h5>
            </div>
            <div class="card-body">
                <canvas id="pekerjaanChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart Pendidikan & Statistik Aset -->
<div class="row mb-4">
    <!-- Chart Pendidikan -->
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-graduation-cap me-2 text-primary"></i>
                    Tingkat Pendidikan Penduduk
                </h5>
            </div>
            <div class="card-body">
                <canvas id="pendidikanChart" height="250"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Statistik Aset -->
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-building me-2 text-danger"></i>
                    Statistik Aset
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6 text-center">
                        <h3 class="text-primary mb-0">{{ number_format($totalAsetDesa) }}</h3>
                        <small class="text-muted">Total Aset Desa</small>
                    </div>
                    <div class="col-6 text-center">
                        <h3 class="text-success mb-0">{{ number_format($totalAsetWarga) }}</h3>
                        <small class="text-muted">Total Aset Warga</small>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-6 text-center">
                        <h4 class="text-warning mb-0">Rp {{ number_format($totalNilaiAsetDesa, 0, ',', '.') }}</h4>
                        <small class="text-muted">Nilai Aset Desa</small>
                    </div>
                    <div class="col-6 text-center">
                        <h4 class="text-danger mb-0">Rp {{ number_format($totalNilaiAsetWarga, 0, ',', '.') }}</h4>
                        <small class="text-muted">Nilai Aset Warga</small>
                    </div>
                </div>
                <hr>
                <canvas id="asetChart" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Detail Statistik -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-table me-2 text-secondary"></i>
                    Detail Statistik Per Desa
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Desa</th>
                                <th>Total Penduduk</th>
                                <th>Laki-laki</th>
                                <th>Perempuan</th>
                                <th>Perangkat Desa</th>
                                <th>Jumlah Aset</th>
                                <th>Nilai Aset (Rp)</th>
                                <th>Status Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistikPerDesa as $desa)
                            <tr>
                                <td>{{ $desa['nama_desa'] }}</td>
                                <td class="text-center">{{ number_format($desa['total_penduduk']) }}</td>
                                <td class="text-center">{{ number_format($desa['penduduk_pria']) }}</td>
                                <td class="text-center">{{ number_format($desa['penduduk_wanita']) }}</td>
                                <td class="text-center">{{ number_format($desa['total_perangkat']) }}</td>
                                <td class="text-center">{{ number_format($desa['total_aset']) }}</td>
                                <td class="text-end">{{ number_format($desa['nilai_aset'], 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $desa['status_update'] }}">
                                        {{ $desa['status_update'] == 'hijau' ? 'Terbaru' : ($desa['status_update'] == 'kuning' ? 'Perlu Update' : 'Belum Update') }}
                                    </span>
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
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- html2pdf.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<!-- SheetJS (xlsx) -->
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Warna untuk chart
    const colors = {
        primary: '#0d6efd',
        success: '#198754',
        info: '#0dcaf0',
        warning: '#ffc107',
        danger: '#dc3545',
        secondary: '#6c757d',
        light: '#f8f9fa',
        dark: '#212529',
        indigo: '#6610f2',
        purple: '#6f42c1',
        pink: '#d63384',
        orange: '#fd7e14',
        teal: '#20c997',
    };
    
    // Chart Perbandingan Antar Desa
    const perbandinganDesaCtx = document.getElementById('perbandinganDesaChart').getContext('2d');
    const perbandinganDesaChart = new Chart(perbandinganDesaCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($grafikPerbandingan['labels']) !!},
            datasets: [
                {
                    label: 'Penduduk',
                    data: {!! json_encode($grafikPerbandingan['penduduk']) !!},
                    backgroundColor: colors.primary,
                    borderColor: colors.primary,
                    borderWidth: 1
                },
                {
                    label: 'Perangkat Desa',
                    data: {!! json_encode($grafikPerbandingan['perangkat']) !!},
                    backgroundColor: colors.success,
                    borderColor: colors.success,
                    borderWidth: 1
                },
                {
                    label: 'Aset',
                    data: {!! json_encode($grafikPerbandingan['aset']) !!},
                    backgroundColor: colors.warning,
                    borderColor: colors.warning,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Perbandingan Data Antar Desa'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    // Chart Klasifikasi Usia
    const klasifikasiUsiaCtx = document.getElementById('klasifikasiUsiaChart').getContext('2d');
    const klasifikasiUsiaChart = new Chart(klasifikasiUsiaCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($klasifikasiUsia->pluck('klasifikasi_usia')) !!},
            datasets: [{
                data: {!! json_encode($klasifikasiUsia->pluck('jumlah')) !!},
                backgroundColor: [colors.primary, colors.success, colors.warning, colors.danger, colors.info],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Distribusi Penduduk Berdasarkan Usia'
                }
            }
        }
    });
    
    // Chart Pekerjaan
    const pekerjaanCtx = document.getElementById('pekerjaanChart').getContext('2d');
    const pekerjaanChart = new Chart(pekerjaanCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topPekerjaan->pluck('pekerjaan')) !!},
            datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($topPekerjaan->pluck('jumlah')) !!},
                backgroundColor: colors.info,
                borderColor: colors.info,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Pekerjaan Terbanyak'
                }
            }
        }
    });
    
    // Chart Pendidikan
    const pendidikanCtx = document.getElementById('pendidikanChart').getContext('2d');
    const pendidikanChart = new Chart(pendidikanCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($pendidikanData->pluck('pendidikan_terakhir')) !!},
            datasets: [{
                data: {!! json_encode($pendidikanData->pluck('jumlah')) !!},
                backgroundColor: [colors.primary, colors.success, colors.warning, colors.danger, colors.info, colors.secondary, colors.dark],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Tingkat Pendidikan Penduduk'
                }
            }
        }
    });
    
    // Chart Aset
    const asetCtx = document.getElementById('asetChart').getContext('2d');
    const asetChart = new Chart(asetCtx, {
        type: 'pie',
        data: {
            labels: ['Aset Desa', 'Aset Tanah Warga'],
            datasets: [{
                data: [{{ $totalNilaiAsetDesa }}, {{ $totalNilaiAsetWarga }}],
                backgroundColor: [colors.warning, colors.danger],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Perbandingan Nilai Aset'
                }
            }
        }
    });
    
    // Export PDF
    document.getElementById('btn-export-pdf').addEventListener('click', function() {
        const element = document.querySelector('.container-fluid');
        const opt = {
            margin: 10,
            filename: 'statistik-kecamatan.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };
        
        // Notifikasi
        alert('Sedang menyiapkan PDF, harap tunggu...');
        
        // Generate PDF
        html2pdf().set(opt).from(element).save();
    });
    
    // Export Excel
    document.getElementById('btn-export-excel').addEventListener('click', function() {
        // Persiapkan data untuk Excel
        const data = [];
        
        // Header
        data.push(['Desa', 'Total Penduduk', 'Laki-laki', 'Perempuan', 'Perangkat Desa', 'Jumlah Aset', 'Nilai Aset']);
        
        // Data desa
        @foreach($statistikPerDesa as $desa)
        data.push([
            '{{ $desa["nama_desa"] }}',
            {{ $desa["total_penduduk"] }},
            {{ $desa["penduduk_pria"] }},
            {{ $desa["penduduk_wanita"] }},
            {{ $desa["total_perangkat"] }},
            {{ $desa["total_aset"] }},
            {{ $desa["nilai_aset"] }}
        ]);
        @endforeach
        
        // Buat workbook
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, 'Statistik Desa');
        
        // Simpan file
        XLSX.writeFile(wb, 'statistik-kecamatan.xlsx');
    });
});
</script>
@endpush