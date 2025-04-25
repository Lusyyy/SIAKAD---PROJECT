@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Jadwal Akademik Hari {{ $hari }}</h4>
            <div>
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah Jadwal
                </a>
                <a href="{{ route('jadwal.pdf', ['hari' => $hari]) }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </a>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Ruang</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $index => $jadwal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jadwal->matakuliah->Nama_mk }} ({{ $jadwal->matakuliah->Kode_mk }})</td>
                            <td>{{ $jadwal->matakuliah->sks }}</td>
                            <td>{{ $jadwal->ruang->nama_ruang }}</td>
                            <td>{{ $jadwal->golongan->nama_Gol }}</td>
                            <td class="text-center">
                                <a href="{{ route('jadwal.show', $jadwal->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada jadwal untuk hari {{ $hari }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection