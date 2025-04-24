@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Presensi Akademik</h4>
            <div>
                <a href="{{ route('presensi.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah Presensi
                </a>
                <a href="{{ route('presensi.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Matakuliah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($presensis as $index => $presensi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $presensi->tanggal }}</td>
                            <td>{{ $presensi->hari }}</td>
                            <td>{{ $presensi->NIM }}</td>
                            <td>{{ $presensi->mahasiswa->Nama }}</td>
                            <td>{{ $presensi->matakuliah->Nama_mk }}</td>
                            <td>
                                @if($presensi->status_kehadiran == 'Hadir')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($presensi->status_kehadiran == 'Izin')
                                    <span class="badge bg-warning">Izin</span>
                                @elseif($presensi->status_kehadiran == 'Sakit')
                                    <span class="badge bg-info">Sakit</span>
                                @else
                                    <span class="badge bg-danger">Alfa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('presensi.edit', $presensi->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('presensi.destroy', $presensi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data presensi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection