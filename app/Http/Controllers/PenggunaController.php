<?php

namespace App\Http\Controllers;

use App\Models\Detailbarang;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::where('role', 'Pengguna')->latest()->get();
        $ruangans  = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('user.pengguna', compact('penggunas', 'ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users',
            'ruangan'   => 'required|string',
            'password'  => 'required|string|min:8'
        ], [
            'name.required'     => 'Kolom masih kosong',
            'username.required' => 'Kolom masih kosong',
            'username.unique'   => 'Username sudah ada',
            'ruangan.required'  => 'Kolom masih kosong',
            'password.required' => 'Kolom masih kosong',
            'password.min'      => 'Minimal Password 8 karakter'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'role'      => 'Pengguna',
            'ruangan'   => $request->ruangan,
            'password'  => Hash::make($request->password)
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Data ' . $user->name . ' ditambahkan.');
    }

    public function dashboard()
    {
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('pengguna', compact('ruangans'));
    }

    public function ubah_password()
    {
        return view('pengguna-ubahpswd');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'ruangan'   => 'required|string'
        ],[
            'ruangan.required'  => 'Kolom masih kosong'
        ]);

        return redirect()->route('pengguna.result', $request->ruangan);
    }

    public function result($id)
    {
        $data_ruangan = Ruangan::findOrFail($id);
        $details = Detailbarang::where('ruangan_id', $data_ruangan->id)->orderBy('kode_barang', 'ASC')->orderBy('nomor_urut', 'ASC')->paginate(20);
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('pengguna-filter', compact('data_ruangan', 'details', 'ruangans'));
    }

    public function perbaiki($id)
    {
        $detail = Detailbarang::findOrFail($id);
        $detail->update([
            'keterangan'    => 'Request Perbaikan dari : '. Auth::user()->name,
            'status'        => 'Perbaiki'
        ]);

        return redirect()->route('pengguna.result', $detail->ruangan_id)->with('success', 'Permintaan Perbaikan sukses.');
    }

    public function perbaikan()
    {
        $details = Detailbarang::when(request()->q, function ($details) {
            $details = $details->where('nomor_urut', request()->q );
        })->where('status', 'Perbaiki')->orderBy('updated_at', 'ASC')->paginate(20);
        return view('detail-barang.perbaiki', compact('details'));
    }
}
