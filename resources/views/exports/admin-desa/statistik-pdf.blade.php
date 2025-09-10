<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .header p {
            margin-top: 0;
            color: #7f8c8d;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            background-color: #3498db;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 8px 10px;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>

    <!-- Statistik Penduduk -->
    <div class="section">
        <h2 class="section-title">Statistik Penduduk</h2>
        <table>
            <tr>
                <th width="60%">Keterangan</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>Total Penduduk</td>
                <td class="text-center">{{ number_format($data['penduduk']['total'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Penduduk Laki-laki</td>
                <td class="text-center">{{ number_format($data['penduduk']['pria'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Penduduk Perempuan</td>
                <td class="text-center">{{ number_format($data['penduduk']['wanita'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Memiliki KTP</td>
                <td class="text-center">{{ number_format($data['penduduk']['ber_ktp'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Belum Memiliki KTP</td>
                <td class="text-center">{{ number_format($data['penduduk']['belum_ktp'], 0, ',', '.') }}</td>
            </tr>
        </table>

        <h3>Klasifikasi Usia</h3>
        <table>
            <tr>
                <th width="60%">Kelompok Usia</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            @foreach($data['penduduk']['klasifikasi_usia'] as $usia)
            <tr>
                <td>{{ $usia->klasifikasi_usia }}</td>
                <td class="text-center">{{ number_format($usia->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Top 5 Pekerjaan</h3>
        <table>
            <tr>
                <th width="60%">Pekerjaan</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            @foreach($data['penduduk']['top_pekerjaan'] as $pekerjaan)
            <tr>
                <td>{{ $pekerjaan->pekerjaan ?: 'Tidak Ada' }}</td>
                <td class="text-center">{{ number_format($pekerjaan->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Statistik Perangkat Desa -->
    <div class="section">
        <h2 class="section-title">Statistik Perangkat Desa</h2>
        <table>
            <tr>
                <th width="60%">Keterangan</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>Total Perangkat Desa Aktif</td>
                <td class="text-center">{{ number_format($data['perangkat']['total'], 0, ',', '.') }}</td>
            </tr>
        </table>

        <h3>Perangkat Desa per Jabatan</h3>
        <table>
            <tr>
                <th width="60%">Jabatan</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            @foreach($data['perangkat']['per_jabatan'] as $jabatan)
            <tr>
                <td>{{ ucwords(str_replace('_', ' ', $jabatan->jabatan)) }}</td>
                <td class="text-center">{{ number_format($jabatan->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Statistik Aset -->
    <div class="section">
        <h2 class="section-title">Statistik Aset</h2>
        <table>
            <tr>
                <th width="60%">Keterangan</th>
                <th width="40%" class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>Total Aset Desa</td>
                <td class="text-center">{{ number_format($data['aset']['total_aset_desa'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Nilai Aset Desa</td>
                <td class="text-right">Rp {{ number_format($data['aset']['total_nilai_aset_desa'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Aset Tanah Warga</td>
                <td class="text-center">{{ number_format($data['aset']['total_aset_warga'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Nilai Aset Tanah Warga</td>
                <td class="text-right">Rp {{ number_format($data['aset']['total_nilai_aset_warga'], 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <!-- Grafik Bulanan -->
    <div class="section">
        <h2 class="section-title">Perkembangan Bulanan {{ $tahun }}</h2>
        <table>
            <tr>
                <th>Bulan</th>
                <th class="text-center">Penduduk Baru</th>
                <th class="text-center">Perangkat Baru</th>
            </tr>
            @foreach($data['grafik_bulanan'] as $grafik)
            <tr>
                <td>{{ $grafik['bulan'] }}</td>
                <td class="text-center">{{ number_format($grafik['penduduk'], 0, ',', '.') }}</td>
                <td class="text-center">{{ number_format($grafik['perangkat'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>Laporan ini dibuat otomatis oleh Sistem Informasi Kecamatan pada {{ $tanggal }}</p>
    </div>
</body>
</html>