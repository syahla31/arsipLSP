@extends('layouts.master')

@section('content')

{{-- Menambahkan CSS untuk animasi langsung di sini agar mudah --}}
<style>
    @keyframes fade-slide-up {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-slide-up {
        animation: fade-slide-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
    }
</style>

{{-- Latar Belakang Gradien dan Penengah Konten --}}
<div class="w-full min-h-screen flex items-center justify-center p-4">

    {{-- KARTU KACA (GLASSMORPHISM) --}}
    <div class="relative w-full max-w-sm bg-white/50 backdrop-blur-xl border border-white/60 shadow-2xl rounded-2xl animate-fade-slide-up">
        
        {{-- FOTO PROFIL (OVERLAP) --}}
        <div class="absolute -top-16 left-1/2 -translate-x-1/2">
            <img src="{{ asset('images/foto.jpg') }}" alt="Foto Profil" 
                 class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
        </div>

        <div class="pt-20 p-8 text-center">
            {{-- NAMA --}}
            <h2 class="text-2xl font-bold text-gray-800">Syahla' Syafiqah Fayra</h2>

            {{-- NIM & JURUSAN --}}
            <p class="text-blue-600 mt-1 font-mono">2141720015</p>
            <p class="text-gray-600 text-sm mt-1">D4 - Teknik Informatika</p>

            {{-- IKON SOSIAL MEDIA --}}
            <div class="flex justify-center gap-5 mt-6">
                <a href="https://github.com/syahla31" title="GitHub" class="text-gray-500 hover:text-gray-900 transition-colors">
                    <svg class="w-6 h-6" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                </a>
                <a href="https://www.linkedin.com/in/syahlasyafiqah" title="LinkedIn" class="text-gray-500 hover:text-blue-700 transition-colors">
                    <svg class="w-6 h-6" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                </a>
            </div>

            {{-- PEMISAH --}}
            <hr class="border-gray-200/80 my-6">

            {{-- INFO APLIKASI --}}
            <div>
                <p class="text-sm text-gray-500">Aplikasi Arsip Surat ini dibuat pada:</p>
                <p class="text-gray-800 font-medium mt-1">20 September 2025</p>
            </div>
        </div>
    </div>
</div>
@endsection