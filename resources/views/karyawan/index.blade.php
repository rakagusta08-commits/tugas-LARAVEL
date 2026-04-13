@extends('layouts.main')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        
        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="px-3 py-4 border-b mb-4 flex justify-between items-center bg-gray-50 rounded-t-lg">
            <h2 class="text-2xl font-bold text-gray-800">Data Karyawan</h2>
            {{-- Tombol Tambah - Pastikan warna Birunya keluar --}}
            <a href="{{ route('karyawan.tambah') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 shadow-md transition-all duration-200 font-bold">
                + Tambah Data
            </a>
        </div>

        {{-- SEARCH --}}
        <form method="GET" action="/karyawan" class="mb-6">
            <div class="flex gap-2 max-w-md">
                <input
                    type="text"
                    name="search"
                    class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Cari nama atau jabatan..."
                    value="{{ request('search') }}"
                >
                <button type="submit" class="bg-slate-700 text-white px-4 py-2 rounded hover:bg-slate-800 transition shadow-sm font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="/karyawan" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-500 flex items-center shadow-sm">
                        Reset
                    </a>
                @endif
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse border border-gray-100">
                <thead>
                    <tr class="bg-slate-200">
                        <th class="p-3 border-b text-gray-800 font-bold">No</th>
                        <th class="p-3 border-b text-gray-800 font-bold">Nama</th>
                        <th class="p-3 border-b text-gray-800 font-bold">Posisi</th>
                        <th class="p-3 border-b text-gray-800 font-bold">Jabatan</th>
                        <th class="p-3 border-b text-gray-800 font-bold">Level</th>
                        <th class="p-3 border-b text-gray-800 font-bold">Gaji Pokok</th>
                        <th class="p-3 border-b text-center text-gray-800 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawan as $index => $item)
                    <tr class="hover:bg-blue-50 transition border-b border-gray-100">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3 font-semibold text-gray-900">{{ $item->nama }}</td>
                        <td class="p-3 text-gray-600">{{ $item->posisi }}</td>
                        <td class="p-3">{{ $item->nama_jabatan ?? '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full border border-blue-200">
                                {{ $item->level ?? '-' }}
                            </span>
                        </td>
                        <td class="p-3 font-mono text-sm text-green-600 font-bold">
                            Rp {{ number_format($item->gaji_pokok, 0, ',', '.') }}
                        </td>
                        <td class="p-3">
                            <div class="flex justify-center gap-2">
                                {{-- Tombol Edit - Teks Hitam Pekat --}}
                                <a href="{{ url('/karyawan/' . $item->id . '/edit') }}"
                                   class="text-xs bg-yellow-400 text-gray-900 px-3 py-1.5 rounded font-bold hover:bg-yellow-500 shadow-sm transition">
                                    EDIT
                                </a>
                                <form action="{{ url('/karyawan/' . $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs bg-red-600 text-white px-3 py-1.5 rounded font-bold hover:bg-red-700 shadow-sm transition"
                                            onclick="return confirm('Yakin ingin menghapus data {{ $item->nama }}?')">
                                        HAPUS
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-10 text-center text-gray-400">
                            <div class="flex flex-col items-center">
                                <span class="text-lg">Database Kosong 📭</span>
                                @if(request('search'))
                                    <span class="text-sm">Tidak ada hasil untuk "<strong>{{ request('search') }}</strong>"</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection