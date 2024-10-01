<?php

namespace App\Http\Controllers;

use App\Models\Detailbarang;
use App\Models\Maintenence;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan');
    }

    public function result($nomor)
    {
        $detail = Detailbarang::where('nomor_urut', $nomor)->first();
        if ($detail) {
            $maintenance = Maintenence::where('detailbarang_id', $detail->id)->orderBy('created_at','DESC')->first();
            if ($maintenance) {
                $mainten = date('d-m-Y', strtotime($maintenance->created_at));
            }else {
                $mainten ='-';
            }
            return view('result', compact('detail', 'mainten'));
        }else {
            return view('reject');
        }
    }
}
