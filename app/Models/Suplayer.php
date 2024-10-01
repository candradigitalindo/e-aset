<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplayer extends Model
{
    use Uuid;
    protected $fillable = ['nama_suplayer'];
}
