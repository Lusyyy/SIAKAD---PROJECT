<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
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
    <h1>Daftar Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Semester</th>
                <th>Golongan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswas as $index => $mahasiswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mahasiswa->NIM }}</td>
                <td>{{ $mahasiswa->Nama }}</td>
                <td>{{ $mahasiswa->Nohp }}</td>
                <td>{{ $mahasiswa->Semester }}</td>
                <td>{{ $mahasiswa->golongan->nama_Gol }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center">Tidak ada data mahasiswa</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>