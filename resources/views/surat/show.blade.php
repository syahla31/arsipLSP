@extends('layouts.master')

@section('content')
    <div class="p-3 md:p-8">
        {{-- HEADER HALAMAN --}}
        <div class="mb-3">
            <nav class="text-sm mb-2 text-gray-500">
                <a href="{{ route('surat.index') }}" class="hover:underline text-blue-600">Arsip Surat</a>
                <span class="mx-2">&gt;</span>
                <span class="font-medium text-gray-800">Lihat</span>
            </nav>
        </div>

        {{-- KARTU DETAIL SURAT --}}
        <div class="bg-white shadow-lg rounded-xl mb-3">
            <div class="px-3 py-4 border-b border-gray-200 flex items-center gap-3">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-800">Detail Arsip Surat</h2>
            </div>

            <!-- isi detail -->
            <div class="p-3 space-y-1">
                <div>
                    <label class="text-sm text-gray-500">Nomor Surat</label>
                    <p class="text-gray-900 font-medium">{{ $surat->nomor_surat }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Kategori</label>
                    <p>
                        <span
                            class="px-3 py-1 text-xs rounded-full font-semibold
                    @if ($surat->kategori->nama_kategori == 'Undangan') bg-green-100 text-green-800
                    @elseif($surat->kategori->nama_kategori == 'Pengumuman') bg-blue-100 text-blue-800
                    @elseif($surat->kategori->nama_kategori == 'Nota Dinas') bg-yellow-100 text-yellow-800
                    @else bg-purple-100 text-purple-800 @endif">
                            {{ $surat->kategori->nama_kategori }}
                        </span>
                    </p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Judul</label>
                    <p class="text-gray-900 font-medium">{{ $surat->judul }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-500">Waktu Unggah</label>
                    <p class="text-gray-900 font-medium">{{ $surat->created_at->format('d F Y H:i:s') }}</p>
                </div>
            </div>
        </div>


        {{-- KARTU PREVIEW FILE --}}
        <div class="bg-white shadow-lg rounded-xl mb-6">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center gap-3">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                    </path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-800">Preview File</h2>
            </div>
            <div class="p-4">
                <div class="w-full h-[85vh] border rounded-lg overflow-hidden">
                    <iframe src="{{ Storage::url($surat->file_path) }}" class="w-full h-full" frameborder="0"></iframe>
                </div>
            </div>
        </div>

        {{-- TOMBOL AKSI (Sudah disesuaikan untuk tema terang) --}}
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('surat.index') }}"
                class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded-lg transition no-underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
            <a href="{{ route('surat.unduh', $surat->id) }}"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition no-underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Unduh
            </a>
            <a href="#"
                class="flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg transition no-underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L15.232 5.232z">
                    </path>
                </svg>
                Edit / Ganti File
            </a>
        </div>
    </div>
@endsection
