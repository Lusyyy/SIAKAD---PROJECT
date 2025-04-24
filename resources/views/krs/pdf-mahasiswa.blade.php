<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS Mahasiswa: {{ $mahasiswa->Nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            text-align: center;
        }
        .header-info {
            margin-bottom: 20px;
        }
        .header-info table {
            width: 100%;
            border: none;
        }
        .header-info table td {
            padding: 5px;
            border: none;
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
            margin-top: 30px;
            text-align: center;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
            margin-right: 50px;
        }
    </style>
</head>
<body>
    <h1>KARTU RENCANA STUDI (KRS)</h1>
    
    <div class="header-info">
        <table>
            <tr>
                <td style="width: 20%;">NIM</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">{{ $mahasiswa->NIM }}</td>
                <td style="width: 20%;">Golongan</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">{{ $mahasiswa->golongan->nama_Gol }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $mahasiswa->Nama }}</td>
                <td>Total Matakuliah</td>
                <td>:</td>
                <td>{{ $krs->count() }}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>{{ $mahasiswa->Semester }}</td>
                <td>Total SKS</td>
                <td>:</td>
                <td>{{ $krs->sum(function($item) { return $item->matakuliah->sks; }) }}</td>
            </tr>
        </table>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @forelse($krs as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->matakuliah->Kode_mk }}</td>
                <td>{{ $item->matakuliah->Nama_mk }}</td>
                <td>{{ $item->matakuliah->sks }}</td>
                <td>{{ $item->matakuliah->semester }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center">Belum ada matakuliah yang diambil</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="signature">
        <p>Jakarta, {{ date('d F Y') }}</p>
        <br><br><br>
        <p>( __________________ )</p>
        <p>Dosen Pembimbing Akademik</p>
    </div>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>