<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'divisi_id' => 1,
            'hak_akses_id' => 1,
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'password',
            'divisi_id' => 1,
            'hak_akses_id' => 2,
        ]);
        User::create([
            'name' => 'Manager Keuangan',
            'email' => 'manager_keu@example.com',
            'password' => 'password',
            'divisi_id' => 6,
            'hak_akses_id' => 3,
        ]);
        User::create([
            'name' => 'Manager Divisi',
            'email' => 'manager_div@example.com',
            'password' => 'password',
            'divisi_id' => 1,
            'hak_akses_id' => 4,
        ]);
    }
}
