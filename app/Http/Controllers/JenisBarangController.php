<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::when(request()->q, function ($barang) {
            $barang = $barang->where('nama_barang', 'like', '%' . request()->q . '%');
        })->orderBy('kode_barang', 'DESC')->paginate(20);
        return view('jenis-barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'  => 'required|string|unique:barangs',
            'nama_barang'  => 'required|string|unique:barangs'
        ], [
            'kode_barang.required' => 'Kolom masih kosong',
            'nama_barang.required' => 'Kolom masih kosong',
            'kode_barang.unique'   => 'Kode Barang ' . $request->kode_barang . ' sudah ada',
            'nama_barang.unique'   => 'Nama Barang ' . $request->nama_barang . ' sudah ada',
        ]);

        $barang = Barang::create([
            'kode_barang'  => $request->kode_barang,
            'nama_barang'  => $request->nama_barang
        ]);

        return redirect()->route('barang.index')->with('success', 'Data ' . $barang->nama_barang . ' ditambahkan.');
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
        $barang = Barang::findOrFail($id);
        return view('jenis-barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang'  => 'required|string|unique:barangs,kode_barang,' . $id,
            'nama_barang'  => 'required|string|unique:barangs,nama_barang,' . $id
        ], [
            'kode_barang.required' => 'Kolom masih kosong',
            'nama_barang.required' => 'Kolom masih kosong',
            'kode_barang.unique'   => 'Kode Barang ' . $request->kode_barang . ' sudah ada',
            'nama_barang.unique'   => 'Nama Ruangan ' . $request->nama_barang . ' sudah ada',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'kode_barang'  => $request->kode_barang,
            'nama_barang'  => $request->nama_barang
        ]);

        return redirect()->route('barang.index')->with('success', 'Data ' . $barang->nama_barang . ' diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data ' . $barang->nama_barang . ' dihapus.');
    }
}
