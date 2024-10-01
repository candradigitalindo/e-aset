<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::orderBy('updated_at', 'DESC')->get();
        return view('ruangan.index', compact('ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_ruangan'  => 'required|string|unique:ruangans',
            'nama_ruangan'  => 'required|string|unique:ruangans',
            'penanggung_jawab'  => 'required|string',
            'nip'               => 'required|string'
        ], [
            'kode_ruangan.required' => 'Kolom masih kosong',
            'nama_ruangan.required' => 'Kolom masih kosong',
            'kode_ruangan.unique'   => 'Kode Ruangan ' . $request->kode_ruangan . ' sudah ada',
            'nama_ruangan.unique'   => 'Nama Ruangan ' . $request->nama_ruangan . ' sudah ada',
            'penanggung_jawab.required' => 'Kolom masih kosong',
            'nip.required'          => 'Kolom masih kosong',
        ]);

        $ruangan = Ruangan::create([
            'kode_ruangan'  => $request->kode_ruangan,
            'nama_ruangan'  => strtoupper($request->nama_ruangan),
            'penanggung_jawab'  => $request->penanggung_jawab,
            'nip'           => $request->nip
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ' . $ruangan->nama_ruangan . ' ditambahkan.');
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
    public function edit(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_ruangan'  => 'required|string|unique:ruangans,kode_ruangan,' . $id,
            'nama_ruangan'  => 'required|string|unique:ruangans,nama_ruangan,' . $id,
            'penanggung_jawab'  => 'required|string',
            'nip'               => 'required|string'
        ], [
            'kode_ruangan.required' => 'Kolom masih kosong',
            'nama_ruangan.required' => 'Kolom masih kosong',
            'kode_ruangan.unique'   => 'Kode Ruangan ' . $request->kode_ruangan . ' sudah ada',
            'nama_ruangan.unique'   => 'Nama Ruangan ' . $request->nama_ruangan . ' sudah ada',
            'penanggung_jawab.required' => 'Kolom masih kosong',
            'nip.required'          => 'Kolom masih kosong',
        ]);

        $ruangan = Ruangan::findOrFail($id);

        $ruangan->update([
            'kode_ruangan'  => $request->kode_ruangan,
            'nama_ruangan'  => $request->nama_ruangan,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'nip'           => $request->nip
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ' . $ruangan->nama_ruangan . ' diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Data ' . $ruangan->nama_ruangan . ' dihapus.');
    }
}
