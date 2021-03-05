<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'nama_bank' => 'BANK TUNAI'
        ]);
        Bank::create([
            'nama_bank' => 'Mandiri'
        ]);
        Bank::create([
            'nama_bank' => 'BCA'
        ]);
        Bank::create([
            'nama_bank' => 'BRI'
        ]);
        Bank::create([
            'nama_bank' => 'BNI'
        ]);
    }
}
