@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        {{-- Header Halaman --}}
        <div class="text-center mb-3">
            <h1 class="text-3xl font-bold text-blue-900 font-serif">Arsipkan Surat Baru</h1>
            <p class="text-gray-600 mt-1">Unggah dan lengkapi data surat pada form di bawah ini.</p>
            <div class="h-1 bg-blue-500 rounded-full mt-2 mx-auto w-60"></div>
        </div>

        {{-- Kartu Form --}}
        <div class="bg-white shadow-lg rounded-lg max-w-3xl mx-auto p-8">
            {{-- Ganti bagian form Anda dengan ini --}}
            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Input Nomor Surat --}}
                <div class="mb-4">
                    <label for="nomor_surat" class="block mb-2 text-sm font-medium text-gray-900">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('nomor_surat')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Kategori --}}
                <div class="mb-4">
                    <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Judul --}}
                <div class="mb-4">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('judul')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input File --}}
                <div class="mb-4">
                    <label for="file_pdf" class="block mb-2 text-sm font-medium text-gray-900">File Surat (PDF)</label>
                    <input type="file" name="file_pdf" id="file_pdf" accept=".pdf"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none p-2">
                    <p class="mt-1 text-xs text-gray-500">Ukuran maksimal: 2MB</p>
                    @error('file_pdf')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex items-center gap-4 mt-6">
                    <a href="{{ route('surat.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg no-underline">&laquo;
                        Kembali</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
