@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit KRS</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('krs.update', $kr->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NIM" class="form-label">Mahasiswa</label>
                        <select class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" required>
                            <option value="">Pilih Mahasiswa</option>
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->NIM }}" {{ old('NIM', $kr->NIM) == $mahasiswa->NIM ? 'selected' : '' }}>
                                    {{ $mahasiswa->NIM }} - {{ $mahasiswa->Nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('NIM')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Kode_mk" class="form-label">Matakuliah</label>
                        <select class="form-control @error('Kode_mk') is-invalid @enderror" id="Kode_mk" name="Kode_mk" required>
                            <option value="">Pilih Matakuliah</option>
                            @foreach($matakuliahs as $matakuliah)
                                <option value="{{ $matakuliah->Kode_mk }}" {{ old('Kode_mk', $kr->Kode_mk) == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                    {{ $matakuliah->Kode_mk }} - {{ $matakuliah->Nama_mk }} ({{ $matakuliah->sks }} SKS)
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="alert alert-info">
                    <p class="mb-0"><i class="bi bi-info-circle"></i> Pastikan matakuliah belum pernah diambil oleh mahasiswa pada KRS lainnya.</p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection