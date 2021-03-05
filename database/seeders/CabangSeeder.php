<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::create([
            'nama_cabang' => 'IT',
            'kode_cabang' => 'IT'
        ]);
        Cabang::create([
            'nama_cabang' => 'BSD 1',
            'kode_cabang' => 'BSD'
        ]);
        Cabang::create([
            'nama_cabang' => 'Kencana Loka',
            'kode_cabang' => 'KCN'
        ]);
        Cabang::create([
            'nama_cabang' => 'Medan',
            'kode_cabang' => 'MDN'
        ]);
        Cabang::create([
            'nama_cabang' => 'Cilegon',
            'kode_cabang' => 'CGN'
        ]);
    }
}
