<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Golongan;
use Illuminate\Http\Request;
use PDF;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mahasiswa::with('golongan');
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('NIM', 'like', "%{$search}%")
                ->orWhere('Nama', 'like', "%{$search}%");
            });
        }
        
        $mahasiswas = $query->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $golongans = Golongan::all();
        return view('mahasiswa.create', compact('golongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswas',
            'Nama' => 'required',
            'Semester' => 'required|numeric',
            'id_Gol' => 'required|exists:golongans,id_Gol',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $golongans = Golongan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'golongans'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'Nama' => 'required',
            'Semester' => 'required|numeric',
            'id_Gol' => 'required|exists:golongans,id_Gol',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }

    public function downloadPDF()
    {
        $mahasiswas = Mahasiswa::with('golongan')->get();
        $pdf = PDF::loadView('mahasiswa.pdf', compact('mahasiswas'));
        return $pdf->download('daftar-mahasiswa.pdf');
    }
}