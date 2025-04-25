<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar KRS</title>
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
    </style>
</head>
<body>
    <h1>Daftar Kartu Rencana Studi (KRS)</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($krs as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->NIM }}</td>
                <td>{{ $item->mahasiswa->Nama }}</td>
                <td>{{ $item->Kode_mk }}</td>
                <td>{{ $item->matakuliah->Nama_mk }}</td>
                <td>{{ $item->matakuliah->sks }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center">Tidak ada data KRS</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>