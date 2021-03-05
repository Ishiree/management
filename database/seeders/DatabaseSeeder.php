<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HakAksesSeeder::class);
        $this->call(DivisiSeeder::class);
        $this->call(CabangSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(UserSeeder::class);
    }
}
