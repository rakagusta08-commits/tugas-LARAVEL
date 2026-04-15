<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController; // Import Controller Jabatan
use Illuminate\Support\Facades\Route;

// Halaman utama → langsung ke list karyawan
Route::get('/', [KaryawanController::class, 'index']);

// --- GROUP ROUTE KARYAWAN ---
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.tambah');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// --- GROUP ROUTE JABATAN (Folder Baru) ---
// Menggunakan resource agar otomatis membuat route index, create, store, edit, update, destroy
Route::resource('jabatan', JabatanController::class);