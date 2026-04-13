<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <-- TAMBAHKAN BARIS INI (Ini yang bikin error)

// Saran: Gunakan huruf kapital 'Jabatan' agar sesuai dengan standar Laravel/PSR
class Jabatan extends Model 
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $fillable = [
        'nama_jabatan',
        'level',
        'gaji_pokok',
    ];

    // Relasi: 1 Jabatan punya banyak Karyawan
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id', 'id');
    }
}