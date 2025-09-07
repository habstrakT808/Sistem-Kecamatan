<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        
        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        
        .header h2 {
            font-size: 14px;
            margin: 5px 0;
            font-weight: normal;
        }
        
        .info {
            margin-bottom: 20px;
        }
        
        .info table {
            width: 100%;
        }
        
        .info td {
            padding: 3px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        table, th, td {
            border: 1px solid #000;
        }
        
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
            padding: 8px 4px;
            font-size: 10px;
        }
        
        td {
            padding: 6px 4px;
            font-size: 10px;
            vertical-align: top;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        
        .signature {
            margin-top: 50px;
            text-align: right;
            width: 200px;
            float: right;
        }
        
        .page-break {
            page-break-after: always;
        }
        
        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN DATA PENDUDUK</h1>
        <h2>KECAMATAN BELITANG JAYA</h2>
        <p>{{ date('d F Y') }}</p>
    </div>

    <div class="info">
        <table style="border: none;">
            <tr style="border: none;">
                <td style="border: none; width: 150px;"><strong>Total Penduduk:</strong></td>
                <td style="border: none;">{{ number_format($penduduks->count()) }} orang</td>
                <td style="border: none; width: 150px;"><strong>Laki-laki:</strong></td>
                <td style="border: none;">{{ number_format($penduduks->where('jenis_kelamin', 'L')->count()) }} orang</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none;"><strong>Tanggal Cetak:</strong></td>
                <td style="border: none;">{{ date('d/m/Y H:i') }}</td>
                <td style="border: none;"><strong>Perempuan:</strong></td>
                <td style="border: none;">{{ number_format($penduduks->where('jenis_kelamin', 'P')->count()) }} orang</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="12%">NIK</th>
                <th width="15%">Nama Lengkap</th>
                <th width="3%">JK</th>
                <th width="8%">Tempat Lahir</th>
                <th width="8%">Tgl Lahir</th>
                <th width="4%">Usia</th>
                <th width="10%">Pekerjaan</th>
                <th width="8%">Pendidikan</th>
                <th width="4%">RT</th>
                <th width="4%">RW</th>
                <th width="12%">Desa</th>
                <th width="5%">KTP</th>
                <th width="8%">Klasifikasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penduduks as $index => $penduduk)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama_lengkap }}</td>
                <td class="text-center">{{ $penduduk->jenis_kelamin }}</td>
                <td>{{ $penduduk->tempat_lahir }}</td>
                <td class="text-center">{{ $penduduk->tanggal_lahir->format('d/m/Y') }}</td>
                <td class="text-center">{{ $penduduk->usia }}</td>
                <td>{{ $penduduk->pekerjaan }}</td>
                <td>{{ $penduduk->pendidikan_terakhir }}</td>
                <td class="text-center">{{ $penduduk->rt }}</td>
                <td class="text-center">{{ $penduduk->rw }}</td>
                <td>{{ $penduduk->desa->nama_desa }}</td>
                <td class="text-center">{{ $penduduk->memiliki_ktp ? 'Ya' : 'Tidak' }}</td>
                <td class="text-center">{{ $penduduk->klasifikasi_usia }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="signature">
            <p>Belitang Jaya, {{ date('d F Y') }}</p>
            <p><strong>Administrator Sistem</strong></p>
            <br><br><br>
            <p><strong>{{ auth()->user()->name }}</strong></p>
        </div>
    </div>
</body>
</html>