<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class KRSController extends Controller
{
    public function index()
    {
        $krs = KRS::with(['mahasiswa', 'matakuliah'])->get();
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('krs.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM', // Ganti mahasiswas dengan mahasiswa
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Cek apakah KRS sudah ada
        $exists = KRS::where('NIM', $request->NIM)
                    ->where('Kode_mk', $request->Kode_mk)
                    ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'KRS sudah ada untuk mahasiswa dan matakuliah tersebut');
        }

        KRS::create($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS berhasil ditambahkan');
    }

    public function update(Request $request, KRS $kr)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM', // Ganti mahasiswas dengan mahasiswa
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Cek apakah kombinasi sudah ada di record lain
        $exists = KRS::where('NIM', $request->NIM)
                    ->where('Kode_mk', $request->Kode_mk)
                    ->where('id', '!=', $kr->id)
                    ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'KRS sudah ada untuk mahasiswa dan matakuliah tersebut');
        }

        $kr->update($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS berhasil diupdate');
    }


    public function destroy(KRS $kr)
    {
        $kr->delete();
        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus');
    }

    public function perMahasiswa($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $krs = KRS::with('matakuliah')->where('NIM', $nim)->get();
        return view('krs.per-mahasiswa', compact('mahasiswa', 'krs'));
    }

    public function downloadPDF($nim = null)
    {
        if ($nim) {
            $mahasiswa = Mahasiswa::findOrFail($nim);
            $krs = KRS::with('matakuliah')->where('NIM', $nim)->get();
            $pdf = PDF::loadView('krs.pdf-mahasiswa', compact('mahasiswa', 'krs'));
            return $pdf->download('krs-' . $mahasiswa->NIM . '.pdf');
        } else {
            $krs = KRS::with(['mahasiswa', 'matakuliah'])->get();
            $pdf = PDF::loadView('krs.pdf', compact('krs'));
            return $pdf->download('daftar-krs.pdf');
        }
    }
}