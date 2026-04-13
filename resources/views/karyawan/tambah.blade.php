@extends('layouts.main')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="border-b pb-3 mb-4">
        <h2 class="text-2xl font-semibold">Tambah Karyawan</h2>
    </div>

    <form action="/karyawan" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama <span class="text-red-500">*</span></label>
            <input type="text" name="nama"
                   class="border rounded px-3 py-2 w-full {{ $errors->has('nama') ? 'border-red-500' : '' }}"
                   value="{{ old('nama') }}" placeholder="Nama lengkap">
            @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Posisi <span class="text-red-500">*</span></label>
            <input type="text" name="posisi"
                   class="border rounded px-3 py-2 w-full {{ $errors->has('posisi') ? 'border-red-500' : '' }}"
                   value="{{ old('posisi') }}" placeholder="Posisi karyawan">
            @error('posisi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-1">Jabatan <span class="text-red-500">*</span></label>
            <select name="jabatan_id"
                    class="border rounded px-3 py-2 w-full {{ $errors->has('jabatan_id') ? 'border-red-500' : '' }}">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatan as $j)
                    <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }} ({{ $j->level }})
                    </option>
                @endforeach
            </select>
            @error('jabatan_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div style="display: flex; gap: 8px;">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
            <a href="/karyawan" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection