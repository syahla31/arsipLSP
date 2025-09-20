{{-- resources/views/kategori/index.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <div class="text-center mb-5 mt-10">
            <h1 class="text-2xl font-bold text-blue-900 font-serif mt-3">📖 Kategori Surat 📖</h1>
            <p class="text-gray-600 mt-2">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
            <div class="h-1 bg-blue-500 rounded-full mt-2 mx-auto w-60"></div>
        </div>

        <div class="flex justify-start mb-4">
            <form action="{{ route('kategori.index') }}" method="GET" class="w-full md:w-2/3">
                <div class="flex items-center gap-3">

                    {{-- 1. Label "Cari Kategori" --}}
                    <label for="search-input" class="font-semibold text-gray-700 whitespace-nowrap">
                        Cari Kategori:
                    </label>

                    {{-- 2. Kolom Input --}}
                    <div class="relative flex-grow">
                        <input type="text" name="search" id="search-input" placeholder="Cari berdasarkan nama kategori..."
                            value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-2 border rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <div class="absolute top-0 left-0 inline-flex items-center p-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    {{-- 3. Tombol "Cari" --}}
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-full shadow-sm">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gradient-to-r from-blue-400 to-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-center">ID Kategori</th>
                        <th class="px-4 py-3 text-left">Nama Kategori</th>
                        <th class="px-4 py-3 text-left">Keterangan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $kategori)
                        <tr class="border-b hover:bg-blue-50 transition">
                            <td class="px-4 py-3 text-center font-medium">{{ $kategori->id }}</td>
                            <td class="px-4 py-3">{{ $kategori->nama_kategori }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $kategori->keterangan }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('kategori.edit', $kategori->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-full text-xs transition">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-gray-500">Belum ada kategori yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="{{ route('kategori.create') }}"
                class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-lg no-underline">
                [+] Tambah Kategori Baru...
            </a>
        </div>
    </div>

    {{-- SweetAlert untuk notifikasi --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
            });
        </script>
    @endif
@endsection