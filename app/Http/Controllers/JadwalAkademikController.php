<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;
use PDF;

class JadwalAkademikController extends Controller
{
    public function index()
    {
        $jadwals = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $matakuliahs = Matakuliah::all();
        $ruangs = Ruang::all();
        $golongans = Golongan::all();
        return view('jadwal.create', compact('matakuliahs', 'ruangs', 'golongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
            'id_ruang' => 'required|exists:ruangs,id_ruang',
            'id_Gol' => 'required|exists:golongans,id_Gol',
        ]);

        // Cek apakah jadwal ruangan sudah digunakan pada hari yang sama
        $existingSchedule = JadwalAkademik::where('hari', $request->hari)
            ->where('id_ruang', $request->id_ruang)
            ->first();
            
        if ($existingSchedule) {
            return redirect()->back()->with('error', 'Ruangan sudah digunakan untuk jadwal lain pada hari yang sama');
        }

        JadwalAkademik::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal akademik berhasil ditambahkan');
    }

    public function show(JadwalAkademik $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(JadwalAkademik $jadwal)
    {
        $matakuliahs = Matakuliah::all();
        $ruangs = Ruang::all();
        $golongans = Golongan::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliahs', 'ruangs', 'golongans'));
    }

    public function update(Request $request, JadwalAkademik $jadwal)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        // Cek apakah jadwal ruangan sudah digunakan pada hari yang sama (oleh jadwal lain)
        $existingSchedule = JadwalAkademik::where('hari', $request->hari)
            ->where('id_ruang', $request->id_ruang)
            ->where('id', '!=', $jadwal->id)
            ->first();
            
        if ($existingSchedule) {
            return redirect()->back()->with('error', 'Ruangan sudah digunakan untuk jadwal lain pada hari yang sama');
        }

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal akademik berhasil diupdate');
    }

    public function destroy(JadwalAkademik $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal akademik berhasil dihapus');
    }

    public function jadwalPerHari($hari)
    {
        $jadwals = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])
            ->where('hari', $hari)
            ->get();
        return view('jadwal.per-hari', compact('jadwals', 'hari'));
    }

    public function jadwalPerGolongan($id_Gol)
    {
        $golongan = Golongan::findOrFail($id_Gol);
        $jadwals = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])
            ->where('id_Gol', $id_Gol)
            ->get();
        return view('jadwal.per-golongan', compact('jadwals', 'golongan'));
    }

    public function downloadPDF($hari = null, $golongan = null)
    {
        $query = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan']);
        $filename = 'jadwal-akademik';
        $title = 'Jadwal Akademik';
        
        if ($hari) {
            $query->where('hari', $hari);
            $filename = 'jadwal-' . strtolower($hari);
            $title .= ' - ' . $hari;
        }
        
        if ($golongan) {
            $golonganData = Golongan::findOrFail($golongan);
            $query->where('id_Gol', $golongan);
            $filename .= '-golongan-' . strtolower($golonganData->nama_Gol);
            $title .= ' - Golongan ' . $golonganData->nama_Gol;
        }
        
        $jadwals = $query->get();
        $pdf = PDF::loadView('jadwal.pdf', compact('jadwals', 'title'));
        return $pdf->download($filename . '.pdf');
    }
}