<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{

    protected $fillable = 
    [
        'judul_permohonan', 'nomor_permohonan', 'jumlah_permohonan', 'note', 'user_id', 'tangal_permohonan',
        'bank_id', 'jenis_permohonan', 'status_berkas', 'status_rilis', 'tanggal_rilis', 'prioritas'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function permohonanRealisasis()
    {
        return $this->hasMany(PermohonanRealisasi::class, 'permohonan_id', 'id');
    }

    public function permohonanKas()
    {
        return $this->hasMany(PermohonanKas::class,'permohonan_id', 'id');
    }

    public function biayaAdmins()
    {
        return $this->hasMany(BiayaAdmin::class, 'permohonan_id', 'id');
    }
}
