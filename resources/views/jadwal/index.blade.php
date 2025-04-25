@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Jadwal Akademik</h4>
            <div>
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah Jadwal
                </a>
                <a href="{{ route('jadwal.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="btn-group">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-outline-primary {{ request()->routeIs('jadwal.index') && !request()->has('hari') ? 'active' : '' }}">Semua Hari</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Senin']) }}" class="btn btn-outline-primary {{ request('hari') == 'Senin' ? 'active' : '' }}">Senin</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Selasa']) }}" class="btn btn-outline-primary {{ request('hari') == 'Selasa' ? 'active' : '' }}">Selasa</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Rabu']) }}" class="btn btn-outline-primary {{ request('hari') == 'Rabu' ? 'active' : '' }}">Rabu</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Kamis']) }}" class="btn btn-outline-primary {{ request('hari') == 'Kamis' ? 'active' : '' }}">Kamis</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Jumat']) }}" class="btn btn-outline-primary {{ request('hari') == 'Jumat' ? 'active' : '' }}">Jumat</a>
                        <a href="{{ route('jadwal.index', ['hari' => 'Sabtu']) }}" class="btn btn-outline-primary {{ request('hari') == 'Sabtu' ? 'active' : '' }}">Sabtu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('jadwal.index') }}" method="GET" class="d-flex">
                        <select name="golongan" class="form-control me-2">
                            <option value="">Pilih Golongan</option>
                            @foreach(\App\Models\Golongan::all() as $golongan)
                                <option value="{{ $golongan->id_Gol }}" {{ request('golongan') == $golongan->id_Gol ? 'selected' : '' }}>
                                    {{ $golongan->nama_Gol }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary">Filter</button>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Matakuliah</th>
                            <th>Ruang</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $index => $jadwal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->matakuliah->Nama_mk }} ({{ $jadwal->matakuliah->Kode_mk }})</td>
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
                            <td colspan="6" class="text-center">Tidak ada data jadwal akademik</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection