@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" value="{{ old('NIM') }}" required>
                        @error('NIM')
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
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Nohp" class="form-label">No. HP</label>
                        <input type="text" class="form-control @error('Nohp') is-invalid @enderror" id="Nohp" name="Nohp" value="{{ old('Nohp') }}">
                        @error('Nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Semester" class="form-label">Semester</label>
                        <input type="number" class="form-control @error('Semester') is-invalid @enderror" id="Semester" name="Semester" min="1" max="8" value="{{ old('Semester') }}" required>
                        @error('Semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="id_Gol" class="form-label">Golongan</label>
                        <select class="form-control @error('id_Gol') is-invalid @enderror" id="id_Gol" name="id_Gol" required>
                            <option value="">Pilih Golongan</option>
                            @foreach($golongan as $golongan)
                                <option value="{{ $golongan->id_Gol }}" {{ old('id_Gol') == $golongan->id_Gol ? 'selected' : '' }}>
                                    {{ $golongan->nama_Gol }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_Gol')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection