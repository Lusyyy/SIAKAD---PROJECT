@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Dosen</h4>
        </div>
        <div class="card-body">
        <form action="{{ route('dosen.update', $dosens->NIP) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NIP" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP" value="{{ $dosens->NIP  }}" required>
                        @error('NIP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" name="Nama" value="{{ $dosens->Nama  }}" required>
                        @error('Nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" name="Alamat" rows="3">{{ $dosens->Alamat }}</textarea>
                        @error('Alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Nohp" class="form-label">No. HP</label>
                        <input type="text" class="form-control @error('Nohp') is-invalid @enderror" id="Nohp" name="Nohp" value="{{ $dosens->Nohp }}">
                        @error('Nohp')
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