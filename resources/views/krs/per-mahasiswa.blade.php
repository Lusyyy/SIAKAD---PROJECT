@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">KRS Mahasiswa: {{ $mahasiswa->Nama }} ({{ $mahasiswa->NIM }})</h4>
            <div>
                <a href="{{ route('krs.create', ['nim' => $mahasiswa->NIM]) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah Matakuliah
                </a>
                <a href="{{ route('krs.pdf.mahasiswa', $mahasiswa->NIM) }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm">
                            <tr>
                                <th style="width: 150px">NIM</th>
                                <td>: {{ $mahasiswa->NIM }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $mahasiswa->Nama }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>: {{ $mahasiswa->Semester }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm">
                            <tr>
                                <th style="width: 150px">Golongan</th>
                                <td>: {{ $mahasiswa->golongan->nama_Gol }}</td>
                            </tr>
                            <tr>
                                <th>Total Matakuliah</th>
                                <td>: {{ $krs->count() }}</td>
                            </tr>
                            <tr>
                                <th>Total SKS</th>
                                <td>: {{ $krs->sum(function($item) { return $item->matakuliah->sks; }) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($krs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->matakuliah->Kode_mk }}</td>
                            <td>{{ $item->matakuliah->Nama_mk }}</td>
                            <td>{{ $item->matakuliah->sks }}</td>
                            <td>{{ $item->matakuliah->semester }}</td>
                            <td class="text-center">
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus matakuliah ini dari KRS?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada matakuliah yang diambil</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali ke Daftar Mahasiswa</a>
        </div>
    </div>
</div>
@endsection