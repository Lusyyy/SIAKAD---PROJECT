@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Detail KRS</h4>
            <div>
                <a href="{{ route('krs.edit', $kr->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('krs.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Data Mahasiswa</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 150px;">NIM</th>
                                    <td>: {{ $kr->mahasiswa->NIM }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $kr->mahasiswa->Nama }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td>: {{ $kr->mahasiswa->Semester }}</td>
                                </tr>
                                <tr>
                                    <th>Golongan</th>
                                    <td>: {{ $kr->mahasiswa->golongan->nama_Gol }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Data Matakuliah</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 150px;">Kode MK</th>
                                    <td>: {{ $kr->matakuliah->Kode_mk }}</td>
                                </tr>
                                <tr>
                                    <th>Nama MK</th>
                                    <td>: {{ $kr->matakuliah->Nama_mk }}</td>
                                </tr>
                                <tr>
                                    <th>SKS</th>
                                    <td>: {{ $kr->matakuliah->sks }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td>: {{ $kr->matakuliah->semester }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{ route('krs.mahasiswa', $kr->NIM) }}" class="btn btn-info">
                    <i class="bi bi-list-check"></i> Lihat Semua KRS Mahasiswa Ini
                </a>
                <form action="{{ route('krs.destroy', $kr->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus KRS ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus KRS
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection