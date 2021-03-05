<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hak_akses = array("SYSTEM ADMINISTRATOR", "USER", "MANAGER KEUANGAN", "MANAGER DIVISI");
        $kode_hak_akses = array("sysadmin", "user", "manager_keuangan", "manager_divisi");
        for ($i = 0; $i < sizeof($hak_akses); $i++) {
            $role = HakAkses::create([
                'hak_akses' => $hak_akses[$i],
                'kode_hak_akses' => $kode_hak_akses[$i],
            ]);
        }
    }
}
