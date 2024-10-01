<?php

namespace App\Http\Controllers;

use App\Models\Suplayer;
use Illuminate\Http\Request;

class SuplayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplayers = Suplayer::latest()->get();
        return view('suplayer.index', compact('suplayers'));
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
            'nama_suplayer'  => 'required|string',
        ], [
            'nama_suplayer.required' => 'Kolom masih kosong',
        ]);

        $suplayer = Suplayer::create([
            'nama_suplayer'  => $request->nama_suplayer,
        ]);

        return redirect()->route('vendor.index')->with('success', 'Data ' . $suplayer->nama_suplayer . ' ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suplayer = Suplayer::findOrFail($id);
        $suplayer->delete();
        return redirect()->route('vendor.index')->with('success', 'Data ' . $suplayer->nama_suplayer . ' dihapus.');
    }
}
