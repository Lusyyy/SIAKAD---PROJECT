<?php

namespace App\Http\Controllers;
use App\Models\Dosen;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dosens = Dosen::all();
        return view('dosen.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'NIP' => 'required|numeric',
            'Nama' => 'required',
            'Alamat' => 'required',
            'Nohp' => 'required|numeric',
            
        ]);
        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIP)
    {
        $dosens = Dosen::findOrFail($NIP);
        return view('dosen.edit', compact('dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIP)
    {
        $request->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'Nohp' => 'required|numeric',
        ]);
        
        $dataEdit = [
            'Nama'=> $request->Nama,
            'Alamat'=>$request->Alamat,
            'Nohp'=>$request->Nohp,
            
            
        ];
        Dosen::where('NIP', $NIP)->update($dataEdit);
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
