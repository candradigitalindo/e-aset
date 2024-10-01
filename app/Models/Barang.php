<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use Uuid;
    protected $fillable = ['kode_barang', 'nama_barang'];

    public function detailbarang()
    {
        return $this->hasMany(Detailbarang::class);
    }
}
