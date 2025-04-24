@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <!-- Tambah setelah card header -->
<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Data Mahasiswa</h4>
    <div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i> Tambah Mahasiswa
        </a>
        <a href="{{ route('mahasiswa.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
            <i class="bi bi-file-pdf"></i> Download PDF
        </a>
    </div>
</div>
<div class="card-body">
    <!-- Form Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari NIM atau Nama..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <!-- Tabel data -->
    <div class="table-responsive">
        <!-- ... -->
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Semester</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
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
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.show', $mahasiswa->NIM) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->NIM) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->NIM) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('krs.mahasiswa', $mahasiswa->NIM) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-clipboard-check"></i> KRS
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data mahasiswa</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection