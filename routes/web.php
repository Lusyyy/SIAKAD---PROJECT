<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\PresensiAkademikController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Routes Golongan
Route::resource('golongan', GolonganController::class);
Route::get('golongan-pdf', [GolonganController::class, 'downloadPDF'])->name('golongan.pdf');

// Routes Ruang
Route::resource('ruang', RuangController::class);
Route::get('ruang-pdf', [RuangController::class, 'downloadPDF'])->name('ruang.pdf');

// Routes Dosen
Route::resource('dosen', DosenController::class);
Route::get('dosen-pdf', [DosenController::class, 'downloadPDF'])->name('dosen.pdf');

// Routes Matakuliah
Route::resource('matakuliah', MatakuliahController::class);
Route::get('matakuliah-pdf', [MatakuliahController::class, 'downloadPDF'])->name('matakuliah.pdf');

// Routes Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswa-pdf', [MahasiswaController::class, 'downloadPDF'])->name('mahasiswa.pdf');

// Routes Jadwal Akademik
Route::resource('jadwal', JadwalAkademikController::class);
Route::get('jadwal-pdf', [JadwalAkademikController::class, 'downloadPDF'])->name('jadwal.pdf');

// Routes Pengampu
Route::resource('pengampu', PengampuController::class);
Route::get('pengampu-pdf', [PengampuController::class, 'downloadPDF'])->name('pengampu.pdf');

// Routes KRS
Route::resource('krs', KRSController::class);
Route::get('krs-mahasiswa/{nim}', [KRSController::class, 'perMahasiswa'])->name('krs.mahasiswa');
Route::get('krs-pdf', [KRSController::class, 'downloadPDF'])->name('krs.pdf');
Route::get('krs-pdf/{nim}', [KRSController::class, 'downloadPDF'])->name('krs.pdf.mahasiswa');

// Routes Presensi Akademik
Route::resource('presensi', PresensiAkademikController::class);
Route::get('presensi-pdf', [PresensiAkademikController::class, 'downloadPDF'])->name('presensi.pdf');
Route::get('presensi-rekap-mahasiswa/{nim}', [PresensiAkademikController::class, 'rekapPerMahasiswa'])->name('presensi.rekap.mahasiswa');
Route::get('presensi-rekap-matakuliah/{kode_mk}', [PresensiAkademikController::class, 'rekapPerMatakuliah'])->name('presensi.rekap.matakuliah');