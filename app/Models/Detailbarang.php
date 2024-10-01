<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbarang extends Model
{
    use Uuid;
    protected $fillable = ['ruangan_id', 'barang_id', 'kode_barang', 'nomor_urut', 'merek_type', 'tahun_perolehan', 'keterangan', 'status'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function maintenence()
    {
        return $this->hasMany(Maintenence::class);
    }
}
