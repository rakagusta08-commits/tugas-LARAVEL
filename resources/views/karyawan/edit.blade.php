@extends('layouts.main')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-100">
    <div class="border-b pb-3 mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Edit Karyawan</h2>
    </div>

    <form action="{{ url('/karyawan/' . $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
            <input type="text" name="nama"
                   class="border rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                   value="{{ old('nama', $karyawan->nama) }}">
            @error('nama') <p class="text-red-500 text-sm mt-1 font-medium">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-bold text-gray-700 mb-1">Posisi <span class="text-red-500">*</span></label>
            <input type="text" name="posisi"
                   class="border rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 {{ $errors->has('posisi') ? 'border-red-500' : 'border-gray-300' }}"
                   value="{{ old('posisi', $karyawan->posisi) }}">
            @error('posisi') <p class="text-red-500 text-sm mt-1 font-medium">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-bold text-gray-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
            <select name="jabatan_id"
                    class="border rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-500 {{ $errors->has('jabatan_id') ? 'border-red-500' : 'border-gray-300' }}">
                <option value="">-- Pilih Jabatan --</option>
                
                {{-- Loop data jabatan yang dikirim dari controller --}}
                @forelse($jabatan as $j)
                    <option value="{{ $j->id }}"
                        {{ (old('jabatan_id') ?? $karyawan->jabatan_id) == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }} ({{ $j->level }})
                    </option>
                @empty
                    <option value="" disabled>Data jabatan tidak ditemukan di database</option>
                @endforelse
            </select>
            @error('jabatan_id') <p class="text-red-500 text-sm mt-1 font-medium">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-yellow-400 text-black px-5 py-2 rounded-md font-bold hover:bg-yellow-500 transition shadow-sm">
                UPDATE
            </button>
            <a href="/karyawan" class="bg-gray-400 text-white px-5 py-2 rounded-md font-bold hover:bg-gray-500 transition shadow-sm">
                KEMBALI
            </a>
        </div>
    </form>
</div>
@endsection