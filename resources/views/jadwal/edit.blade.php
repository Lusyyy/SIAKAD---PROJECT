@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Jadwal Akademik</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin" {{ old('hari', $jadwal->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari', $jadwal->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari', $jadwal->hari) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari', $jadwal->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari', $jadwal->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari', $jadwal->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Kode_mk" class="form-label">Matakuliah</label>
                        <select class="form-control @error('Kode_mk') is-invalid @enderror" id="Kode_mk" name="Kode_mk" required>
                            <option value="">Pilih Matakuliah</option>
                            @foreach($matakuliahs as $matakuliah)
                                <option value="{{ $matakuliah->Kode_mk }}" {{ old('Kode_mk', $jadwal->Kode_mk) == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                    {{ $matakuliah->Kode_mk }} - {{ $matakuliah->Nama_mk }} ({{ $matakuliah->sks }} SKS)
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_ruang" class="form-label">Ruang</label>
                        <select class="form-control @error('id_ruang') is-invalid @enderror" id="id_ruang" name="id_ruang" required>
                            <option value="">Pilih Ruang</option>
                            @foreach($ruangs as $ruang)
                                <option value="{{ $ruang->id_ruang }}" {{ old('id_ruang', $jadwal->id_ruang) == $ruang->id_ruang ? 'selected' : '' }}>
                                    {{ $ruang->nama_ruang }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_ruang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="id_Gol" class="form-label">Golongan</label>
                        <select class="form-control @error('id_Gol') is-invalid @enderror" id="id_Gol" name="id_Gol" required>
                            <option value="">Pilih Golongan</option>
                            @foreach($golongans as $golongan)
                                <option value="{{ $golongan->id_Gol }}" {{ old('id_Gol', $jadwal->id_Gol) == $golongan->id_Gol ? 'selected' : '' }}>
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
                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection