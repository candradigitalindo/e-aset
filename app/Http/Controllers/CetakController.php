<?php

namespace App\Http\Controllers;

use App\Models\Detailbarang;
use App\Models\Ruangan;
use App\Models\UAKPB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('cetak.index', compact('ruangans'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'ruangan'   => 'required|string'
        ],[
            'ruangan.required'  => 'Kolom masih kosong'
        ]);

        return redirect()->route('cetak.result', $request->ruangan);
    }

    public function result($id)
    {
        $data_ruangan = Ruangan::findOrFail($id);
        $details = Detailbarang::where('ruangan_id', $data_ruangan->id)->orderBy('kode_barang', 'ASC')->orderBy('nomor_urut', 'ASC')->paginate(20);
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('cetak.filter', compact('data_ruangan', 'details', 'ruangans'));
    }

    public function cetak_satuan($id)
    {
        $detail = Detailbarang::findOrFail($id);
        return view('cetak.labelsatuan', compact('detail'));
    }

    public function cetak_label($id)
    {
        $details = Detailbarang::where('ruangan_id', $id)->orderBy('nomor_urut', 'ASC')->get();
        return view('cetak.label', compact('details'));
    }

    public function cetak_dokumen($id)
    {
        $data = UAKPB::first();
        $ruangan = Ruangan::findOrFail($id);
        $details = Detailbarang::where('ruangan_id', $ruangan->id)->orderBy('kode_barang', 'ASC')->orderBy('nomor_urut', 'ASC')->get();
        return view('cetak.dokumen', compact('ruangan', 'details', 'data'));
    }
}
