@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Dashboard Sistem Informasi Akademik</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Mahasiswa</h5>
                                    <p class="card-text fs-2">{{ \App\Models\Mahasiswa::count() }}</p>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-light">Lihat Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Dosen</h5>
                                    <p class="card-text fs-2">{{ \App\Models\Dosen::count() }}</p>
                                    <a href="{{ route('dosen.index') }}" class="btn btn-sm btn-light">Lihat Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-warning text-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Matakuliah</h5>
                                    <p class="card-text fs-2">{{ \App\Models\Matakuliah::count() }}</p>
                                    <a href="{{ route('matakuliah.index') }}" class="btn btn-sm btn-light">Lihat Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Jadwal Hari Ini</h5>
                                </div>
                                <div class="card-body">
                                    @php
                                        $today = \Carbon\Carbon::now()->format('l');
                                        $jadwals = \App\Models\JadwalAkademik::where('hari', $today)->with(['matakuliah', 'ruang', 'golongan'])->get();
                                    @endphp
                                    
                                    @if($jadwals->count() > 0)
                                        <ul class="list-group">
                                            @foreach($jadwals as $jadwal)
                                                <li class="list-group-item">
                                                    <strong>{{ $jadwal->matakuliah->Nama_mk }}</strong> - {{ $jadwal->ruang->nama_ruang }}<br>
                                                    <small>Golongan: {{ $jadwal->golongan->nama_Gol }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-center">Tidak ada jadwal hari ini</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Presensi Terakhir</h5>
                                </div>
                                <div class="card-body">
                                    @php
                                        $presensis = \App\Models\PresensiAkademik::with(['mahasiswa', 'matakuliah'])->orderBy('created_at', 'desc')->take(5)->get();
                                    @endphp
                                    
                                    @if($presensis->count() > 0)
                                        <ul class="list-group">
                                            @foreach($presensis as $presensi)
                                                <li class="list-group-item">
                                                    <strong>{{ $presensi->mahasiswa->Nama }}</strong> - {{ $presensi->matakuliah->Nama_mk }}<br>
                                                    <small>{{ $presensi->tanggal }} ({{ $presensi->status_kehadiran }})</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-center">Belum ada data presensi</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection