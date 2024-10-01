<?php

namespace App\Http\Controllers;

use App\Models\UAKPB;
use Illuminate\Http\Request;

class UAKPBController extends Controller
{
    public function index()
    {
        $data = UAKPB::first();
        return view('UAKPB.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string',
            'nip'   => 'required|string'
        ], [
            'nama.required' => 'Kolom masih kosong',
            'nip.required'  => 'Kolom masih kosong',
        ]);
        $data = UAKPB::findOrFail($id);
        $data->update([
            'nama'  => $request->nama,
            'nip'   => $request->nip
        ]);

        return redirect()->route('UAKPB.index')->with('success', 'Data UAKPB diubah.');
    }
}
