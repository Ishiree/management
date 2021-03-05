<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    public function permohonanRealisasi()
    {
        return $this->hasMany(PermohonanRealisasi::class, 'realisasi_id', 'id');
    }
}
