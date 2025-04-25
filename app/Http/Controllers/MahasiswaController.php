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
        $golongan = Golongan::all(); // ini ambil datanya
        return view('mahasiswa.create', compact('golongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswa',
            'Nama' => 'required',
            'Semester' => 'required|numeric',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($NIM)
    {
        $mahasiswas = Mahasiswa::findOrFail($NIM);
        $golongans = Golongan::all();
        return view('mahasiswa.edit', compact('mahasiswas', 'golongans'));
    }

    public function update(Request $request, $NIM)
    {
        $request->validate([
            'Nama' => 'required',
            'Semester' => 'required|numeric',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);
        
        $dataEdit = [
            'Nama'=> $request->Nama,
            'Alamat'=>$request->Alamat,
            'Nohp'=>$request->Nohp,
            'Semester'=>$request->Semester,
            'id_Gol'=>$request->id_Gol
        ];
        Mahasiswa::where('NIM', $NIM)->update($dataEdit);
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