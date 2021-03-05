<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanRealisasi extends Model
{
    use HasFactory;

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class, 'realisasi_id');
    }
}
