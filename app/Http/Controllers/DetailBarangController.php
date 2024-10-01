<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailbarang;
use App\Models\Maintenence;
use App\Models\Ruangan;
use App\Models\Ruanganuser;
use App\Models\Suplayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruanganuser = Ruanganuser::where('user_id', Auth::user()->id)->get('ruangan_id');
        $details = Detailbarang::when(request()->q, function ($details) {
            $details = $details->where('nomor_urut', 'like', '%' . request()->q . '%' );
        })->whereIn('ruangan_id', $ruanganuser)->orderBy('nomor_urut', 'DESC')->paginate(20);
        return view('detail-barang.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangans   = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        $barangs    = Barang::orderBy('nama_barang', 'ASC')->get();

        return view('detail-barang.create', compact('ruangans', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang'    => 'required|string',
            'ruangan'   => 'required|string',
            'nomor_urut'=> 'required|string|unique:detailbarangs',
            'merek_type'=> 'required|string',
            'tahun_perolehan'   => 'required|string',
            'keterangan'=> 'required|string',
            'status'    => 'required|string'
        ], [
            'barang.required'   => 'Pilih Jenis Barang',
            'ruangan.required'  => 'Pilih Ruangan',
            'nomor_urut.required'=> 'Kolom masih kosong',
            'nomor_urut.unique' => 'Nomor urut '.$request->nomor_urut. ' sudah ada',
            'merek_type.required'   => 'Kolom masih kosong',
            'tahun_perolehan.required'  => 'Kolom masih kosong',
            'keterangan.required'   => 'Kolom masih kosong',
            'status.required'   => 'Kolom masih kosong',
        ]);

        $barang = Barang::findOrFail($request->barang);

        $detail = Detailbarang::create([
            'ruangan_id'    => $request->ruangan,
            'barang_id'     => $request->barang,
            'kode_barang'   => $barang->kode_barang,
            'nomor_urut'    => $request->nomor_urut,
            'merek_type'    => $request->merek_type,
            'tahun_perolehan'=> $request->tahun_perolehan,
            'keterangan'    => $request->keterangan,
            'status'        => $request->status
        ]);

        return redirect()->route('detailbarang.index')->with('success', 'Data ' . $detail->nomor_urut . ' ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Detailbarang::findOrFail($id);
        $suplayers = Suplayer::orderBy('nama_suplayer', 'ASC')->get();
        $maintenances = Maintenence::where('detailbarang_id', $detail->id)->orderBy('updated_at', 'DESC')->paginate(20);
        return view('detail-barang.show', compact('detail', 'suplayers', 'maintenances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruangans   = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        $barangs    = Barang::orderBy('nama_barang', 'ASC')->get();

        $detail = Detailbarang::findOrFail($id);
        return view('detail-barang.edit', compact('ruangans', 'barangs', 'detail' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang'    => 'required|string',
            'ruangan'   => 'required|string',
            'nomor_urut'=> 'required|string|unique:detailbarangs,nomor_urut,'.$id,
            'merek_type'=> 'required|string',
            'tahun_perolehan'   => 'required|string',
            'keterangan'=> 'required|string',
            'status'    => 'required|string'
        ], [
            'barang.required'   => 'Pilih Jenis Barang',
            'ruangan.required'  => 'Pilih Ruangan',
            'nomor_urut.required'=> 'Kolom masih kosong',
            'nomor_urut.unique' => 'Nomor urut '.$request->nomor_urut. ' sudah ada',
            'merek_type.required'   => 'Kolom masih kosong',
            'tahun_perolehan.required'  => 'Kolom masih kosong',
            'keterangan.required'   => 'Kolom masih kosong',
            'status.required'   => 'Kolom masih kosong',
        ]);
        $detail = Detailbarang::findOrFail($id);
        $barang = Barang::findOrFail($request->barang);
        $detail->update([
            'ruangan_id'    => $request->ruangan,
            'barang_id'     => $request->barang,
            'kode_barang'   => $barang->kode_barang,
            'nomor_urut'    => $request->nomor_urut,
            'merek_type'    => $request->merek_type,
            'tahun_perolehan'=> $request->tahun_perolehan,
            'keterangan'    => $request->keterangan,
            'status'        => $request->status
        ]);

        return redirect()->route('detailbarang.index')->with('success', 'Data ' . $detail->nomor_urut . ' diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Detailbarang::findOrFail($id);
        $detail->delete();
        return redirect()->route('detailbarang.index')->with('success', 'Data ' . $detail->nomor_urut . ' dihapus.');
    }
}
