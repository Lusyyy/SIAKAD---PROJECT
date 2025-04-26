@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Presensi</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('presensi.update', $presensi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NIM" class="form-label">Mahasiswa</label>
                        <select class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" required>
                            <option value="">Pilih Mahasiswa</option>
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->NIM }}" {{ old('NIM', $presensi->NIM) == $mahasiswa->NIM ? 'selected' : '' }}>
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
                                <option value="{{ $matakuliah->Kode_mk }}" {{ old('Kode_mk', $presensi->Kode_mk) == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                    {{ $matakuliah->Kode_mk }} - {{ $matakuliah->Nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $presensi->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin" {{ old('hari', $presensi->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari', $presensi->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari', $presensi->hari) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari', $presensi->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari', $presensi->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari', $presensi->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
                        <select class="form-control @error('status_kehadiran') is-invalid @enderror" id="status_kehadiran" name="status_kehadiran" required>
                            <option value="">Pilih Status</option>
                            <option value="Hadir" {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Izin" {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Sakit" {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Alfa" {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                        </select>
                        @error('status_kehadiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('presensi.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Otomatis mengisi hari berdasarkan tanggal yang dipilih
    const tanggalInput = document.getElementById('tanggal');
    const hariInput = document.getElementById('hari');
    
    tanggalInput.addEventListener('change', function() {
        const date = new Date(this.value);
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const dayIndex = date.getDay();
        const dayName = days[dayIndex];
        
        // Jika hari adalah Minggu, tampilkan peringatan
        if (dayIndex === 0) {
            alert('Perhatian: Tanggal yang dipilih adalah hari Minggu. Biasanya tidak ada perkuliahan pada hari Minggu.');
        }
        
        // Set nilai dropdown hari
        for (let i = 0; i < hariInput.options.length; i++) {
            if (hariInput.options[i].value === dayName) {
                hariInput.selectedIndex = i;
                break;
            }
        }
    });
});
</script>
@endsection