@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Tambah Matakuliah</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Kode_mk" class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control @error('Kode_mk') is-invalid @enderror" id="Kode_mk" name="Kode_mk" value="{{ old('Kode_mk') }}" required>
                        @error('Kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Nama_mk" class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control @error('Nama_mk') is-invalid @enderror" id="Nama_mk" name="Nama_mk" value="{{ old('Nama_mk') }}" required>
                        @error('Nama_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sks" class="form-label">sks</label>
                        <input type="text" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" value="{{ old('sks') }}" required>
                        @error('sks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="semester" class="form-label">semester</label>
                        <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" required>
                        @error('semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection