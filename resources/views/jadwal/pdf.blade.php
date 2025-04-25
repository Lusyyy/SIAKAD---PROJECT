<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Jadwal Akademik' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">SISTEM INFORMASI AKADEMIK</div>
        <div>Universitas XYZ</div>
        <div>Jl. Pendidikan No. 123, Kota, Indonesia</div>
    </div>
    
    <h1>{{ $title ?? 'JADWAL AKADEMIK' }}</h1>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Matakuliah</th>
                <th>SKS</th>
                <th>Ruang</th>
                <th>Golongan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwals as $index => $jadwal)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->matakuliah->Nama_mk }} ({{ $jadwal->matakuliah->Kode_mk }})</td>
                <td>{{ $jadwal->matakuliah->sks }}</td>
                <td>{{ $jadwal->ruang->nama_ruang }}</td>
                <td>{{ $jadwal->golongan->nama_Gol }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center">Tidak ada data jadwal</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>