@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NIP" class="form-label">NIP</label>
                        <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP" value="{{ old('NIP') }}" required>
                        @error('NIP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" name="Nama" value="{{ old('Nama') }}" required>
                        @error('Nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Nohp" class="form-label">No hp</label>
                        <input type="text" class="form-control @error('Nohp') is-invalid @enderror" id="Nohp" name="Nohp" value="{{ old('Nohp') }}" required>
                        @error('Nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" name="Alamat" rows="3">{{ old('Alamat') }}</textarea>
                        @error('Alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection