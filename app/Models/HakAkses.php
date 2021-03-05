<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'hak_akses_id', 'id');
    }
}
