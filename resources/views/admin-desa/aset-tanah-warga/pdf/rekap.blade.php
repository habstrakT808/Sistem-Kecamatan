<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Rekap Aset Tanah Warga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
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
            margin-bottom: 20px;
        }
        table.summary {
            margin-bottom: 30px;
        }
        table.summary td {
            padding: 5px;
            border: 1px solid #ddd;
        }
        table.summary th {
            background-color: #f2f2f2;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table.data th {
            background-color: #f2f2f2;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table.data td {
            padding: 6px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table.data td.text-left {
            text-align: left;
        }
        table.data td.text-right {
            text-align: right;
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
        <h2>REKAP ASET TANAH WARGA</h2>
        <h3>DESA {{ strtoupper($desa->nama_desa) }}</h3>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>
    
    <table class="summary">
        <tr>
            <th width="25%">Total SPH</th>
            <td width="25%">{{ number_format($totalSPH) }}</td>
            <th width="25%">Total Luas</th>
            <td width="25%">{{ number_format($totalLuas, 2) }} m²</td>
        </tr>
        <tr>
            <th>Rata-rata Nilai/m²</th>
            <td>Rp {{ number_format($rataRataNilai, 0, ',', '.') }}</td>
            <th>Total Nilai Aset</th>
            <td>Rp {{ number_format($totalNilai, 0, ',', '.') }}</td>
        </tr>
    </table>
    
    <h3>Rekap Berdasarkan Jenis Tanah</h3>
    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Jenis Tanah</th>
                <th width="10%">Jumlah</th>
                <th width="10%">Persentase</th>
                <th width="15%">Luas (m²)</th>
                <th width="15%">Persentase</th>
                <th width="20%">Nilai Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; $totalJumlah = 0; $totalLuasAll = 0; $totalNilaiAll = 0; @endphp
            @foreach($rekapData as $rekap)
            @php 
                $totalJumlah += $rekap['jumlah']; 
                $totalLuasAll += $rekap['luas']; 
                $totalNilaiAll += $rekap['nilai']; 
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-left">{{ $rekap['jenis'] }}</td>
                <td>{{ number_format($rekap['jumlah']) }}</td>
                <td>{{ number_format($rekap['persen_jumlah'], 2) }}%</td>
                <td class="text-right">{{ number_format($rekap['luas'], 2) }}</td>
                <td>{{ number_format($rekap['persen_luas'], 2) }}%</td>
                <td class="text-right">{{ number_format($rekap['nilai'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2"><strong>TOTAL</strong></td>
                <td><strong>{{ number_format($totalJumlah) }}</strong></td>
                <td><strong>100.00%</strong></td>
                <td class="text-right"><strong>{{ number_format($totalLuasAll, 2) }}</strong></td>
                <td><strong>100.00%</strong></td>
                <td class="text-right"><strong>{{ number_format($totalNilaiAll, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>