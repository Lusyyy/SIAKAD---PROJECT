<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class PresensiAkademikController extends Controller
{
    public function index()
    {
        $presensis = PresensiAkademik::with(['mahasiswa', 'matakuliah'])->get();
        return view('presensi.index', compact('presensis'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('presensi.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        PresensiAkademik::create($request->all());
        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil ditambahkan');
    }

    public function show(PresensiAkademik $presensi)
    {
        return view('presensi.show', compact('presensi'));
    }

    public function edit(PresensiAkademik $presensi)
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('presensi.edit', compact('presensi', 'mahasiswas', 'matakuliahs'));
    }

    public function update(Request $request, PresensiAkademik $presensi)
    {
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        $presensi->update($request->all());
        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil diupdate');
    }

    public function destroy(PresensiAkademik $presensi)
    {
        $presensi->delete();
        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil dihapus');
    }

    public function downloadPDF()
    {
        $presensis = PresensiAkademik::with(['mahasiswa', 'matakuliah'])->get();
        $pdf = PDF::loadView('presensi.pdf', compact('presensis'));
        return $pdf->download('daftar-presensi.pdf');
    }

    public function rekapPerMahasiswa($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $presensis = PresensiAkademik::with('matakuliah')->where('NIM', $nim)->get();
        return view('presensi.rekap-mahasiswa', compact('mahasiswa', 'presensis'));
    }

    public function rekapPerMatakuliah($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $presensis = PresensiAkademik::with('mahasiswa')->where('Kode_mk', $kode_mk)->get();
        return view('presensi.rekap-matakuliah', compact('matakuliah', 'presensis'));
    }
}