<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;        // ← pastikan baris ini ada!

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $Jabatan = [
            ['nama_jabatan' => 'Software Engineer', 'level' => 'Staff',   'gaji_pokok' => 8000000],
            ['nama_jabatan' => 'Project Manager',   'level' => 'Manager', 'gaji_pokok' => 15000000],
            ['nama_jabatan' => 'UI/UX Designer',    'level' => 'Staff',   'gaji_pokok' => 7500000],
            ['nama_jabatan' => 'HR Specialist',     'level' => 'Staff',   'gaji_pokok' => 7000000],
            ['nama_jabatan' => 'Finance Manager',   'level' => 'Manager', 'gaji_pokok' => 14000000],
        ];

        foreach ($Jabatan as $j) {
            Jabatan::create($j);
        }
    }
}