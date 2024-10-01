<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruanganuser extends Model
{
    use Uuid;
    protected $fillable = ['user_id', 'ruangan_id'];
}
