<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

// Halaman utama → langsung ke list karyawan
Route::get('/', [KaryawanController::class, 'index']);

// List semua karyawan + search
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

// Form tambah karyawan
// DIBENARKAN: Name route disamakan dengan yang kamu panggil di index.blade.php
Route::get('/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.tambah');

// Simpan karyawan baru
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

// Form edit karyawan
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');

// Update karyawan
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Hapus karyawan
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');