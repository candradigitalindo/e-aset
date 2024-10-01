<?php

namespace App\Http\Controllers;

use App\Imports\BarangImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:csv,xls,xlsx'
        ], [
            'file.required' => 'Kolom maisih kosong',
            'file.mimes'    => 'File harus berupa csv,xls,xlsx'
        ]);

        Excel::import(new BarangImport(), $request->file('file'));

        return redirect()->route('import.index')->with('success', 'Data Berhasil diimport.');
    }
}
