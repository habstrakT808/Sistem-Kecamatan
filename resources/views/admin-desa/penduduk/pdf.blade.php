<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2, .header h3 {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 5px;
            font-size: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA PENDUDUK</h2>
        <h3>{{ $desa->nama_desa }}</h3>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>JK</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Usia</th>
                <th>Agama</th>
                <th>Status</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>KTP</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penduduks as $key => $penduduk)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $penduduk->nik }}</td>
                    <td>{{ $penduduk->nama_lengkap }}</td>
                    <td>{{ $penduduk->jenis_kelamin }}</td>
                    <td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d/m/Y') }}</td>
                    <td>{{ $penduduk->usia }} ({{ $penduduk->klasifikasi_usia }})</td>
                    <td>{{ $penduduk->agama }}</td>
                    <td>{{ $penduduk->status_perkawinan }}</td>
                    <td>{{ $penduduk->pendidikan_terakhir }}</td>
                    <td>{{ $penduduk->pekerjaan }}</td>
                    <td>{{ $penduduk->alamat }}</td>
                    <td>{{ $penduduk->rt }}/{{ $penduduk->rw }}</td>
                    <td>{{ $penduduk->memiliki_ktp ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" style="text-align: center;">Tidak ada data penduduk</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>{{ $desa->nama_desa }}, {{ date('d F Y') }}</p>
        <br><br><br>
        <p>{{ $desa->kepala_desa }}</p>
        <p>Kepala Desa</p>
    </div>
</body>
</html>