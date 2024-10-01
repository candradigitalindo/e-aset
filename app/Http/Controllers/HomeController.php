<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailbarang;
use App\Models\Maintenence;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Pengguna') {
            return redirect()->route('pengguna.dashboard');
        }else {
            $ruangan    = Ruangan::count();
            $barang     = Barang::count();
            $data_barang= Detailbarang::count();
            $user       = User::count();

            $data_perolehan = Detailbarang::where('tahun_perolehan', date('Y'))->latest()->get();
            $maintenences   = Maintenence::whereYear('created_at', date('Y'))->latest()->get();
            return view('home', compact('ruangan', 'barang', 'data_barang', 'user', 'data_perolehan', 'maintenences'));
        }
    }

    public function ubah_password()
    {
        return view('ubahpassword');
    }

    public function post_ubah_password(Request $request)
    {
        $request->validate([
            'password'  => 'required|string|min:8'
        ],[
            'password.required' => 'Kolom masih kosong',
            'password.min'      => 'Minimal 8 karakter'
        ]);

        $user = User::find(Auth::user()->id);
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success','Password sudah diganti dengan '.$request->password);
    }
}
