<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenence extends Model
{
    use Uuid;
    protected $fillable = ['detailbarang_id','kode_barang', 'nama_barang', 'merek_type', 'keterangan', 'suplayer', 'tanggal_perbaikan', 'tanggal_selesai'];

    public function detailbarang()
    {
        return $this->belongsTo(Detailbarang::class);
    }
}
