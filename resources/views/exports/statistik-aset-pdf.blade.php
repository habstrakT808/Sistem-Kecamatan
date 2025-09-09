<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
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
            margin: 5px 0 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 11px;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
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
            font-size: 10px;
            color: #666;
        }
        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Desa</th>
                <th width="10%">Total Aset Desa</th>
                <th width="15%">Nilai Aset Desa (Rp)</th>
                <th width="10%">Total Aset Tanah</th>
                <th width="15%">Nilai Aset Tanah (Rp)</th>
                <th width="10%">Total Aset</th>
                <th width="15%">Total Nilai Aset (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @if(count($data['items']) > 0)
                @foreach($data['items'] as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item['desa']->nama_desa }}</td>
                    <td class="text-center">{{ $item['total_aset_desa'] }}</td>
                    <td class="text-right">{{ number_format($item['total_nilai_aset_desa'], 0, ',', '.') }}</td>
                    <td class="text-center">{{ $item['total_aset_tanah'] }}</td>
                    <td class="text-right">{{ number_format($item['total_nilai_aset_tanah'], 0, ',', '.') }}</td>
                    <td class="text-center">{{ $item['total_aset'] }}</td>
                    <td class="text-right">{{ number_format($item['total_nilai_aset'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2" class="text-center">TOTAL</td>
                    <td class="text-center">{{ $data['total']['total_aset_desa'] }}</td>
                    <td class="text-right">{{ number_format($data['total']['total_nilai_aset_desa'], 0, ',', '.') }}</td>
                    <td class="text-center">{{ $data['total']['total_aset_tanah'] }}</td>
                    <td class="text-right">{{ number_format($data['total']['total_nilai_aset_tanah'], 0, ',', '.') }}</td>
                    <td class="text-center">{{ $data['total']['total_aset'] }}</td>
                    <td class="text-right">{{ number_format($data['total']['total_nilai_aset'], 0, ',', '.') }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>