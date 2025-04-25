@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Detail Jadwal Akademik</h4>
            <div>
                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Informasi Jadwal</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 150px;">Hari</th>
                                    <td>: {{ $jadwal->hari }}</td>
                                </tr>
                                <tr>
                                    <th>Golongan</th>
                                    <td>: {{ $jadwal->golongan->nama_Gol }}</td>
                                </tr>
                                <tr>
                                    <th>Ruang</th>
                                    <td>: {{ $jadwal->ruang->nama_ruang }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Informasi Matakuliah</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 150px;">Kode MK</th>
                                    <td>: {{ $jadwal->matakuliah->Kode_mk }}</td>
                                </tr>
                                <tr>
                                    <th>Nama MK</th>
                                    <td>: {{ $jadwal->matakuliah->Nama_mk }}</td>
                                </tr>
                                <tr>
                                    <th>SKS</th>
                                    <td>: {{ $jadwal->matakuliah->sks }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td>: {{ $jadwal->matakuliah->semester }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Dosen Pengampu</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $pengampus = \App\Models\Pengampu::with('dosen')
                                    ->where('Kode_mk', $jadwal->Kode_mk)
                                    ->get();
                            @endphp
                            
                            @if($pengampus->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama Dosen</th>
                                                <th>No. HP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengampus as $index => $pengampu)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pengampu->dosen->NIP }}</td>
                                                <td>{{ $pengampu->dosen->Nama }}</td>
                                                <td>{{ $pengampu->dosen->Nohp }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-center">Belum ada dosen pengampu untuk matakuliah ini</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{ route('jadwal.pdf', ['hari' => $jadwal->hari]) }}" class="btn btn-danger" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download Jadwal Hari {{ $jadwal->hari }}
                </a>
                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus Jadwal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection