<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Ruanganuser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        return view('user.index', compact('users', 'ruangans'));
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
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users',
            'role'      => 'required|string',
            'ruangan'   => 'required|array',
            'password'  => 'required|string|min:8'
        ], [
            'name.required'     => 'Kolom masih kosong',
            'username.required' => 'Kolom masih kosong',
            'username.unique'   => 'Username sudah ada',
            'role.required'     => 'Kolom masih kosong',
            'password.required' => 'Kolom masih kosong',
            'password.min'      => 'Minimal Password 8 karakter',
            'ruangan.required'  => 'Kolom masih kosong'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'role'      => $request->role,
            'password'  => Hash::make($request->password)
        ]);

        if ($request->ruangan) {
            foreach ($request->ruangan as $ruangan) {
                Ruanganuser::create([
                    'user_id'       => $user->id,
                    'ruangan_id'    => $ruangan
                ]);
            }
        }

        return redirect()->route('user.index')->with('success', 'Data ' . $user->name . ' ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $user->update(['password' => '12345678']);
        return redirect()->back()->with('success', 'Password ' . $user->name . ' direset menjadi 12345678');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $ruangans = Ruangan::orderBy('nama_ruangan', 'ASC')->get();
        $ruanganusers = Ruanganuser::where('user_id', $user->id)->get('ruangan_id')->toArray();
        if ($ruanganusers) {
            foreach ($ruanganusers as $key) {
                $data[] = $key['ruangan_id'];
            }
        }else {
            $data = [];
        }
        return view('user.edit', compact('user', 'ruangans', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users,username,' . $id,
            'role'      => 'required|string',
            'password'  => 'nullable|string|min:8',
            'ruangan'   => 'required|array'
        ], [
            'name.required'     => 'Kolom masih kosong',
            'username.required' => 'Kolom masih kosong',
            'username.unique'   => 'Username sudah ada',
            'role.required'     => 'Kolom masih kosong',
            'password.min'      => 'Minimal Password 8 karakter',
            'ruangan.required'  => 'Kolom masih kosong'
        ]);

        $user = User::findOrFail($id);
        if ($request->password != null) {
            $user->update([
                'name'      => $request->name,
                'username'  => $request->username,
                'role'      => $request->role,
                'password'  => Hash::make($request->password)
            ]);
        }else {
            $user->update([
                'name'      => $request->name,
                'username'  => $request->username,
                'role'      => $request->role,
            ]);
        }

        $ruanganusers = Ruanganuser::where('user_id', $user->id)->get();
        if ($ruanganusers) {
            foreach ($ruanganusers as $ruanganuser) {
                $ruanganuser->delete();
            }

            if ($request->ruangan) {
                foreach ($request->ruangan as $ruangan) {
                    Ruanganuser::create([
                        'user_id'       => $user->id,
                        'ruangan_id'    => $ruangan
                    ]);
                }
            }
        }else {
            if ($request->ruangan) {
                foreach ($request->ruangan as $ruangan) {
                    Ruanganuser::create([
                        'user_id'       => $user->id,
                        'ruangan_id'    => $ruangan
                    ]);
                }
            }
        }

        return redirect()->route('user.index')->with('success', 'Data ' . $user->name . ' diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Data ' . $user->name . ' dihapus.');
    }
}
