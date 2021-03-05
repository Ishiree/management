<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'nama_divisi' => 'IT',
            'kode_divisi' => 'IT'
        ]);
        Divisi::create([
            'nama_divisi' => 'HRD',
            'kode_divisi' => 'HRD'
        ]);
        Divisi::create([
            'nama_divisi' => 'Sosprom',
            'kode_divisi' => 'SOS'
        ]);
        Divisi::create([
            'nama_divisi' => 'GA',
            'kode_divisi' => 'GA'
        ]);
        Divisi::create([
            'nama_divisi' => 'Fundraising dan Wakaf',
            'kode_divisi' => 'FW'
        ]);
        Divisi::create([
            'nama_divisi' => 'Kuangan',
            'kode_divisi' => 'KEU'
        ]);
        Divisi::create([
            'nama_divisi' => 'Accounting',
            'kode_divisi' => 'ACC'
        ]);
        Divisi::create([
            'nama_divisi' => 'Keasramaan',
            'kode_divisi' => 'ASR'
        ]);
    }
}
