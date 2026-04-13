<?php

namespace App\Http\Controllers;

// Memastikan model diimport dengan benar agar tidak "Class not found"
use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menampilkan semua data karyawan + join jabatan + search
    public function index(Request $request)
    {
        $search = $request->search;

        // Menggunakan leftJoin agar karyawan tetap muncul meskipun jabatannya belum diset
        $karyawan = Karyawan::leftJoin('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->select('karyawan.*', 'jabatan.nama_jabatan', 'jabatan.level', 'jabatan.gaji_pokok')
            ->when($search, function ($query) use ($search) {
                $query->where('karyawan.nama', 'like', '%' . $search . '%')
                      ->orWhere('jabatan.nama_jabatan', 'like', '%' . $search . '%');
            })
            ->get();

        return view('karyawan.index', ['karyawan' => $karyawan, 'search' => $search]);
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        // Mengambil semua data jabatan agar dropdown di form tambah tidak kosong
        $jabatan = Jabatan::all();

        return view('karyawan.tambah', ['jabatan' => $jabatan]);
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required',
            'posisi'     => 'required',
            'jabatan_id' => 'required'
        ]);

        Karyawan::create([
            'nama'       => $request->nama,
            'posisi'     => $request->posisi,
            'jabatan_id' => $request->jabatan_id
        ]);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        
        // KRUSIAL: Harus ambil data jabatan lagi di sini agar dropdown Edit tidak kosong
        $jabatan  = Jabatan::all();

        return view('karyawan.edit', ['karyawan' => $karyawan, 'jabatan' => $jabatan]);
    }

    // Menyimpan perubahan data karyawan
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama'       => 'required',
            'posisi'     => 'required',
            'jabatan_id' => 'required'
        ]);

        $karyawan->update([
            'nama'       => $request->nama,
            'posisi'     => $request->posisi,
            'jabatan_id' => $request->jabatan_id
        ]);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil diupdate');
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }
}