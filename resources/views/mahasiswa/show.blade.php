@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Detail Mahasiswa</h4>
            <div>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('mahasiswa.edit', $mahasiswa->NIM) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('krs.mahasiswa', $mahasiswa->NIM) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-clipboard-check"></i> KRS
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th style="width: 150px">NIM</th>
                            <td>: {{ $mahasiswa->NIM }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $mahasiswa->Nama }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>: {{ $mahasiswa->Nohp }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>: {{ $mahasiswa->Semester }}</td>
                        </tr>
                        <tr>
                            <th>Golongan</th>
                            <td>: {{ $mahasiswa->golongan->nama_Gol }}</td>
                        </tr>
                        
                    </table>
                </div>
                
            </div>
            
            <!-- Jika ingin menampilkan riwayat KRS -->
            <div class="mt-4">
                <h5>Riwayat KRS</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Tahun Akademik</th>
                                <th>Jumlah MK</th>
                                <th>Total SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Jika sudah ada model dan relasi untuk KRS -->
                            @if(isset($mahasiswa->krs) && count($mahasiswa->krs) > 0)
                                @foreach($mahasiswa->krs as $index => $krs)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $krs->semester }}</td>
                                    <td>{{ $krs->tahun_akademik }}</td>
                                    <td>{{ $krs->jumlah_mk }}</td>
                                    <td>{{ $krs->total_sks }}</td>
                                    <td>
                                        <a href="{{ route('krs.show', $krs->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data KRS</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection