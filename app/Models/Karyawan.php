<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Sudah benar ada ini

class Karyawan extends Model
{
    use HasFactory; // Tambahkan trait ini agar fitur factory aktif

    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'posisi',    // WAJIB ADA: Karena di Controller kamu simpan data 'posisi'
        'jabatan_id',
        // Jika di database kamu memang ada email/alamat, boleh tetap di sini. 
        // Tapi pastikan 'posisi' jangan sampai ketinggalan.
    ];

    // Relasi: Karyawan belongsTo Jabatan
    // Pastikan foreign key-nya adalah jabatan_id
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}