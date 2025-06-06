@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Dosen</h4>
            <div>
                <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah Data Dosen
                </a>
                <!-- <a href="{{ route('presensi.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nohp</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dosens as $index => $dosen)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dosen->NIP }}</td>
                            <td>{{ $dosen->Nama }}</td>
                            <td>{{ $dosen->Alamat }}</td>
                            <td>{{ $dosen->Nohp }}</td>
                            
                            <td class="text-center">
                                
                                <a href="{{ route('dosen.edit', $dosen->NIP) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('dosen.destroy', $dosen->NIP) }}" method="POST" class="d-inline">
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