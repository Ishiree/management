<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function permohonans()
    {
        return $this->hasMany(Permohonan::class, 'permohonan_id', 'id');
    }
}
