<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    use Uuid;
    protected $fillable = ['kode_barang', 'nama_barang', 'nomor_urut', 'merek_type', 'tahun_perolehan', 'nama_petugas', 'status'];
}
