<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use Uuid;
    protected $fillable = ['kode_ruangan', 'nama_ruangan', 'penanggung_jawab', 'nip'];

    public function detailbarang()
    {
        return $this->hasMany(Detailbarang::class);
    }
}
