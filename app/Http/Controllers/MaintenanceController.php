<?php

namespace App\Http\Controllers;

use App\Models\Detailbarang;
use App\Models\Maintenence;
use App\Models\Suplayer;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'barang'            => 'required|string',
            'keterangan'        => 'required|string',
            // 'tanggal_perbaikan' => 'required|string',
            // 'tanggal_selesai'   => 'required|string',
            // 'suplayer'          => 'required|string'
        ],[
            'barang.required'       => 'ID Barang kosong',
            'keterangan.required'   => 'Kolom masih kosong',
            'tanggal_perbaikan.required'   => 'Kolom masih kosong',
            'tanggal_selesai.required'   => 'Kolom masih kosong',
            'suplayer.required'   => 'Kolom masih kosong',
        ]);
        $detail = Detailbarang::findOrFail($request->barang);
        $maintenance = Maintenence::create([
            'detailbarang_id'       => $request->barang,
            'kode_barang'           => $detail->barang->kode_barang,
            'nama_barang'           => $detail->barang->nama_barang,
            'merek_type'            => $detail->merek_type,
            'keterangan'            => $request->keterangan,
            'suplayer'              => $request->suplayer,
            'tanggal_perbaikan'     => $request->tanggal_perbaikan,
            'tanggal_selesai'       => $request->tanggal_selesai
        ]);

        $detail->update(['keterangan' => '-', 'status' => 'Perbaiki']);

        return redirect()->route('detailbarang.show', $maintenance->detailbarang_id)->with('success', 'Data Perbaikan ditambahkan.');

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
        $maintenance = Maintenence::findOrFail($id);
        $suplayers = Suplayer::orderBy('nama_suplayer', 'ASC')->get();
        return view('detail-barang.editmaintenance', compact('maintenance', 'suplayers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'keterangan'        => 'required|string',
            'tanggal_perbaikan' => 'required|string',
            'tanggal_selesai'   => 'required|string',
            'suplayer'          => 'required|string'
        ],[
            'keterangan.required'   => 'Kolom masih kosong',
            'tanggal_perbaikan.required'   => 'Kolom masih kosong',
            'tanggal_selesai.required'   => 'Kolom masih kosong',
            'suplayer.required'   => 'Kolom masih kosong',
        ]);
        $detail = Detailbarang::findOrFail($request->barang);
        $maintenance = Maintenence::findOrFail($id);
        $maintenance->update([
            'kode_barang'           => $detail->barang->kode_barang,
            'nama_barang'           => $detail->barang->nama_barang,
            'merek_type'            => $detail->merek_type,
            'keterangan'            => $request->keterangan,
            'suplayer'              => $request->suplayer,
            'tanggal_perbaikan'     => $request->tanggal_perbaikan,
            'tanggal_selesai'       => $request->tanggal_selesai
        ]);

        $detail->update(['keterangan' => '-', 'status' => 'Baik']);

        return redirect()->route('detailbarang.show', $maintenance->detailbarang_id)->with('success', 'Data Perbaikan diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maintenance = Maintenence::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('detailbarang.show', $maintenance->detailbarang_id)->with('success', 'Data Perbaikan dihapus.');
    }
}
