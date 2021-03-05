<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanKas extends Model
{
    use HasFactory;

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public function Kas()
    {
        return $this->belongsTo(Kas::class, 'kas_id');
    }
}
