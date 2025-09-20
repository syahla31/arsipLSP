{{-- resources/views/kategori/create.blade.php --}}
@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <div class="text-center mb-3 mt-4">
        <h1 class="text-3xl font-bold text-blue-900 font-serif">Tambah Kategori Baru</h1>
        <div class="h-1 bg-blue-500 rounded-full mt-2 mx-auto w-60"></div>
    </div>

    <div class="bg-white shadow-lg rounded-lg max-w-2xl mx-auto p-8">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                @error('nama_kategori')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="mb-6">
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('keterangan') }}</textarea>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('kategori.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg no-underline">&laquo; Kembali</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection