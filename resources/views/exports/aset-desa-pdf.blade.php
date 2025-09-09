<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Aset Desa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0;
            font-size: 12px;
        }
        .info {
            margin-bottom: 15px;
        }
        .info table {
            width: 100%;
        }
        .info table td {
            padding: 3px;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table.data th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 8px;
            font-size: 12px;
            border: 1px solid #ddd;
        }
        table.data td {
            padding: 6px 8px;
            border: 1px solid #ddd;
            font-size: 11px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .footer p {
            margin: 5px 0;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN DATA ASET DESA</h1>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>
    
    <div class="info">
        <table>
            <tr>
                <td width="15%"><strong>Filter:</strong></td>
                <td width="35%">Desa: {{ $filters['desa'] }}</td>
                <td width="15%">Jenis Aset:</td>
                <td width="35%">{{ $filters['jenis'] }}</td>
            </tr>
            <tr>
                <td>Kondisi:</td>
                <td>{{ $filters['kondisi'] }}</td>
                <td>Status:</td>
                <td>{{ $filters['status'] }}</td>
            </tr>
        </table>
    </div>
    
    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Desa</th>
                <th width="15%">Jenis Aset</th>
                <th width="20%">Nama/Deskripsi</th>
                <th width="10%">Nomor Registrasi</th>
                <th width="10%">Tahun Perolehan</th>
                <th width="10%">Kondisi</th>
                <th width="15%">Nilai Aset (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($asetDesas as $index => $aset)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $aset->desa->nama_desa }}</td>
                <td>{{ $aset->jenis_aset }}</td>
                <td>{{ $aset->nama_aset }}</td>
                <td>{{ $aset->nomor_registrasi }}</td>
                <td class="text-center">{{ $aset->tahun_perolehan }}</td>
                <td>{{ $aset->kondisi }}</td>
                <td class="text-right">{{ number_format($aset->nilai_aset, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data aset desa.</td>
            </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="7" class="text-right">Total Nilai Aset:</td>
                <td class="text-right">{{ number_format($totalNilai, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
        <p>Sistem Informasi Kecamatan</p>
    </div>
</body>
</html>