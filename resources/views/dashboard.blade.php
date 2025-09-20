@extends('layouts.master') {{-- Pastikan Anda memiliki layout master ini --}}

@section('content')
    <div class="container mx-auto p-4">
        <div class="text-center mb-4">
            <h1 class="text-2xl font-bold text-pink-900 font-serif mt-3">
                📜 Arsip Surat 📜
            </h1>
            <p class="text-gray-600 mt-2">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
            <div class="h-1 bg-pink-500 rounded-full mt-2 mx-auto w-60"></div>
        </div>

        <div class="flex justify-between items-center mb-4">
            <form action="{{ route('surat.index') }}" method="GET" class="w-1/2">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari berdasarkan judul surat..."
                        value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2 border rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-400">
                    <div class="absolute top-0 left-0 inline-flex items-center p-3">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </form>

            <a href="{{ route('surat.create') }}"
                class="inline-flex items-center bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full shadow-lg transition duration-150 no-underline">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Arsipkan Surat..
            </a>
        </div>


        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-pink-300 scrollbar-track-pink-100">
                <table class="min-w-full table-auto border-collapse text-sm md:text-base">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-400 to-pink-600 text-white">
                            <th class="px-4 py-3 text-left">Nomor Surat</th>
                            <th class="px-4 py-3 text-left">Kategori</th>
                            <th class="px-4 py-3 text-left">Judul</th>
                            <th class="px-4 py-3 text-center">Waktu Pengarsipan</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surats as $surat)
                            <tr class="border-b hover:bg-pink-50 transition">
                                <td class="px-4 py-3 font-medium">{{ $surat->nomor_surat }}</td>
                                <td class="px-4 py-3">{{ $surat->kategori }}</td>
                                <td class="px-4 py-3">{{ $surat->judul }}</td>
                                <td class="px-4 py-3 text-center">
                                    {{ $surat->created_at->format('d M Y') }}
                                    <span class="text-xs text-gray-500 block">{{ $surat->created_at->format('H:i:s') }}</span>
                                </td>
                                <td class="px-4 py-4 text-center align-middle">
                                    <div class="flex flex-nowrap justify-center items-center gap-2">
                                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full shadow-md text-xs transition">Hapus</button>
                                        </form>

                                        <a href="{{ route('surat.unduh', $surat->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-full shadow-md text-xs transition no-underline">Unduh</a>

                                        <a href="{{ route('surat.show', $surat->id) }}"
                                            class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-full shadow-md text-xs transition no-underline">Lihat</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-2 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p>Belum ada surat yang diarsipkan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($surats->hasPages())
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                    {{ $surats->links('pagination::tailwind') }}
                </div>
            @endif
        </div>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                confirmButtonColor: '#ec4899',
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#ec4899',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            });
        </script>
    @endif
@endsection